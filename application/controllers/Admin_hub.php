<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_hub extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('portfolio_model', 'portfolioManager');
        $this->load->model('admin_model', 'adminManager');
	}

	public function index() {

        // Chargement des CSS
        $this->data['css'] = $this->layout->add_css(array(
            'assets/plugins/bootstrap/css/bootstrap.min',
            'assets/css/styles'
        ));
        // Chargement des JS
        $this->data['js'] = $this->layout->add_js(array(
            'assets/plugins/jquery-3.3.1.min',
            'assets/plugins/bootstrap/js/bootstrap.min',
            'assets/js/admin/admin_login',
            'assets/js/admin/admin_update_user_data',
        ));


        $this->data['subview'] = 'front_office/admin/admin_main';

        $this->load->view('components_home/main', $this->data);

    }

    public  function logout() {
        $this->session->sess_destroy();
        header('Location: ../admin');
        exit();
    }

    public function login_attempt() {


        $rulesArray = array(
            array(
                'field' => 'loginID',
                'label' => 'concernant l\'indetifiant',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'loginPassword',
                'label' => 'concernant le mot de passe',
                'rules' => 'trim|required|max_length[255]'
            ),

        );

        $this->form_validation->set_rules($rulesArray);

        if ($this->form_validation->run() === FALSE) {

            $errorsArray = $this->form_validation->get_all_errors();

            header('Content-type:application/json');
            echo json_encode(array(
                'error' => $errorsArray
            ));

        } else {

            $login = $this->input->post('loginID');
            $password = $this->input->post('loginPassword');


            $checkUser = $this->adminManager->checkExistUser(
                array(
                    'admin_name' => $login
                ));

            if ($checkUser) {

                $checkCouple = $this->adminManager->hash_verify($checkUser->admin_password, $password);

                if ($checkCouple) {

                    /* Création de la session */
                    $id = $checkUser->id;
                    $this->session->set_userdata('id', $id);
                    $this->session->set_userdata('user', $login);
                    $this->session->set_userdata('lastConnection', $checkUser->lastConnection);

                    /* Changement de la dernière date de connection */
                    $lastConnection = date("Y-m-d H:i:s");

                    $this->portfolioManager->adminLogsUpdate('lastConnection', $lastConnection, $id);

                    header('Content-type:application/json');
                    echo json_encode(array(
                        'success' => 'Vous êtes connectés.'
                    ));
                } else {

                    header('Content-type:application/json');
                    echo json_encode(array(
                        'error' => 'Pseudo ou Mot de passe incorrect'
                    ));
                }



            } else {

                header('Content-type:application/json');
                echo json_encode(array(
                    'error' => 'Pseudo ou Mot de passe incorrect'
                ));
            }
        }


    }

    public function modifyUserName() {


        $rulesArray = array(
            array(
                'field' => 'userName',
                'label' => 'concernant le nouvel identifiant',
                'rules' => 'trim|required|max_length[50]|callback_username_check'
            ),
        );

        $this->form_validation->set_rules($rulesArray);

        if ($this->form_validation->run() === FALSE) {

            $errorsArray = $this->form_validation->get_all_errors();

            header('Content-type:application/json');
            echo json_encode(array(
                'error' => $errorsArray
            ));

        } else {

            $newUsername = $this->input->post('userName');
            $this->portfolioManager->adminLogsUpdate('admin_name',  $newUsername, $this->session->userdata('id'));

            /* On déconnecte l'utilisateur */
            $this->session->sess_destroy();

        }

    }

    public function modifyUserPassword() {


        $rulesArray = array(
            array(
                'field' => 'userPassword',
                'label' => 'concernant le nouveau mot de passe',
                'rules' => 'trim|required|max_length[255]|matches[userPasswordConfirm]'
            ),
            array(
                'field' => 'userPasswordConfirm',
                'label' => 'concernant la confirmation du nouveau mot de passe',
                'rules' => 'trim|required|max_length[255]'
            ),
        );

        $this->form_validation->set_rules($rulesArray);

        if ($this->form_validation->run() === FALSE) {

            $errorsArray = $this->form_validation->get_all_errors();

            header('Content-type:application/json');
            echo json_encode(array(
                'error' => $errorsArray
            ));

        } else {

            /* On récupère le mot de passe envoyé puis on le crypte */
            $newPassword = $this->input->post('userPassword');
            $newPasswordCiphered = $this->portfolioManager->cipherPassword($newPassword);

            $this->portfolioManager->adminLogsUpdate('admin_password',  $newPasswordCiphered, $this->session->userdata('id'));

            /* On déconnecte l'utilisateur */
            $this->session->sess_destroy();

        }

    }

    public function adminRecommend() {

        // Chargement des CSS
        $this->data['css'] = $this->layout->add_css(array(
            'assets/plugins/bootstrap/css/bootstrap.min',
            'assets/css/styles'
        ));
        // Chargement des JS
        $this->data['js'] = $this->layout->add_js(array(
            'assets/plugins/jquery-3.3.1.min',
            'assets/plugins/bootstrap/js/bootstrap.min',
        ));

        $this->data['recommendations'] = $this->portfolioManager->getRecommendations();

        $this->data['subview'] = 'front_office/admin/admin_recommend';

        $this->load->view('components_home/main', $this->data);

    }

    public function username_check($data) {

        $pseudoChecker = $this->portfolioManager->checkExistUser($data);
        // die(var_dump($pseudoChecker));

        if (!empty($pseudoChecker)) {
            $this->form_validation->set_message('username_check', 'Cet identifiant existe déjà.');
            return false;
        } else {
            return true;
        }

    }


}
