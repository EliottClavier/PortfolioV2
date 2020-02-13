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
        ));


        $this->data['subview'] = 'front_office/admin/admin_main';

        $this->load->view('components_home/main', $this->data);

    }

    public  function logout() {
        $this->session->sess_destroy();
        redirect();
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

                    $this->session->set_userdata('user', $login);
                    $this->session->set_userdata('email', $checkUser->admin_mail);

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


}
