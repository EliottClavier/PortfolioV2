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
            'assets/plugins/animsition/dist/css/animsition.min',
            'assets/css/styles'
        ));
        // Chargement des JS
        $this->data['js'] = $this->layout->add_js(array(
            'assets/plugins/jquery-3.3.1.min',
            'assets/plugins/bootstrap/js/bootstrap.min',
            'assets/plugins/animsition/dist/js/animsition.min',
            'assets/js/animsition',
            'assets/js/admin/admin_login',
            'assets/js/admin/admin_update_user_data',
        ));

        /* On compte le nombre de recommandations et de projets présents sur le site pour l'afficher sur le panel */
        $this->data['recommend_pending'] = $this->adminManager->adminCountStatus('recommend', "pending");
        $this->data['recommend_verified'] = $this->adminManager->adminCountStatus('recommend', "verified");
        $this->data['project_progress'] = $this->adminManager->adminCountStatus('project', "progress");
        $this->data['project_completed'] = $this->adminManager->adminCountStatus('project', "completed");
        $this->data['project_offline'] = $this->adminManager->adminCountStatus('project', "offline");

        $this->data['subview'] = 'front_office/admin/admin_main';

        $this->load->view('components_home/main', $this->data);

    }

    /* Fonction de deconnexion / destruction de session */
    public  function logout() {
        $this->session->sess_destroy();
        header('Location: ../admin');
        exit();
    }

    /* Fonction de connexion avec validation de formulaire et comparaison avec base de données */
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

            /* On récupère les valeurs du formulaire qu'on compare à la base de données */
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

                    $this->adminManager->adminUpdate('lastConnection', $lastConnection, $id, 'admin_logs');

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

    /* Fonction de modification de nom d'utilisateur */
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

            /* On remplace la donnée correspondant au nom de l'utilisateur */
            $newUsername = $this->input->post('userName');
            $this->adminManager->adminUpdate('admin_name',  $newUsername, $this->session->userdata('id'), 'admin_logs');

            /* On déconnecte l'utilisateur */
            $this->session->sess_destroy();

        }

    }

    /* Fonction de modification de mot de passe utilisateur */
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
            $newPasswordCiphered = $this->adminManager->cipherPassword($newPassword);

            $this->adminManager->adminUpdate('admin_password',  $newPasswordCiphered, $this->session->userdata('id'), 'admin_logs');

            /* On déconnecte l'utilisateur */
            $this->session->sess_destroy();

        }

    }

    /* Fonction de chargement de la vue recommandation admin */
    public function adminRecommend() {

        // Chargement des CSS
        $this->data['css'] = $this->layout->add_css(array(
            'assets/plugins/bootstrap/css/bootstrap.min',
            'assets/plugins/animsition/dist/css/animsition.min',
            'assets/css/styles'
        ));
        // Chargement des JS
        $this->data['js'] = $this->layout->add_js(array(
            'assets/plugins/jquery-3.3.1.min',
            'assets/plugins/bootstrap/js/bootstrap.min',
            'assets/plugins/animsition/dist/js/animsition.min',
            'assets/js/animsition',
            'assets/js/admin/admin_recommend',
        ));

        $this->data['subview'] = 'front_office/admin/admin_recommend';

        $this->load->view('components_home/main', $this->data);

    }

    /* Fonction d'affichage des recommendations en fonction de filtres données */
    public function adminRecommendGetOrder() {

        $mode = $this->input->post('selectOrder');
        $this->data['recommendations'] = $this->portfolioManager->selectedMethod('recommend', $mode);

        $view = $this->load->view('front_office/admin/admin_recommend_search', $this->data, true);

        header('Content-type:application/json');
        echo json_encode(array(
            'view' => $view
        ));

    }

    /* Fonction de modification du status de la recommandation (en attente / vérifiée) */
    public function adminRecommendSwitchStatus() {

        $newStatus = $this->input->post('status');
        $id = $this->input->post('id');
        $this->adminManager->adminUpdate('status', $newStatus, $id, 'recommend');

    }

    /* Fonction de chargement de la vue projet admin */
    public function adminProject() {

        // Chargement des CSS
        $this->data['css'] = $this->layout->add_css(array(
            'assets/plugins/bootstrap/css/bootstrap.min',
            'assets/plugins/animsition/dist/css/animsition.min',
            'assets/css/styles'
        ));
        // Chargement des JS
        $this->data['js'] = $this->layout->add_js(array(
            'assets/plugins/jquery-3.3.1.min',
            'assets/plugins/bootstrap/js/bootstrap.min',
            'assets/plugins/animsition/dist/js/animsition.min',
            'assets/js/animsition',
            'assets/js/admin/admin_project'
        ));

        $this->data['subview'] = 'front_office/admin/admin_project';

        $this->load->view('components_home/main', $this->data);
    }

    /* Fonction d'affichage des projets en fonction de filtres données */
    public function adminProjectGetOrder() {

        $mode = $this->input->post('selectOrder');
        $this->data['projects'] = $this->portfolioManager->selectedMethod('project', $mode);

        $view = $this->load->view('front_office/admin/admin_project_search', $this->data, true);

        header('Content-type:application/json');
        echo json_encode(array(
            'view' => $view
        ));

    }

    /* Fonction d'affichage du modal de modification d'un projet */
    public function adminProjectGetViewModal() {

	    $projectNum = $this->input->post('project');

	    $this->data['selected_project'] = $this->portfolioManager->getTable('project', 'id', $projectNum, false, 'row');

        $view = $this->load->view('front_office/admin/admin_project_edit', $this->data, true);

        header('Content-type:application/json');
        echo json_encode(array(
            'view' => $view
        ));

    }

    /* Fonction de modification d'un projet en BDD en fonction des données envoyés dans le formulaire du modal*/
    public function adminProjectUpdate() {

	    $rulesArray = array(
            array(
                'field' => 'editName',
                'label' => 'concernant le nom du projet',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'editDesc',
                'label' => 'concernant la description du projet',
                'rules' => 'trim|required|max_length[2000]'
            ),
            array(
                'field' => 'editURL',
                'label' => 'concernant l\'URL menant au projet ',
                'rules' => 'trim|max_length[200]'
            ),
            array(
                'field' => 'editImageURL',
                'label' => 'concernant l\'image associée au projet',
                'rules' => 'trim|required|max_length[200]'
            ),
            array(
                'field' => 'editStatus',
                'label' => 'concernant le statut du projet',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($rulesArray);

        if ($this->form_validation->run() === FALSE) {

            $errorsArray = $this->form_validation->get_all_errors();

            header('Content-type:application/json');
            echo json_encode(array(
                'error' => $errorsArray
            ));

        } else {

            $editProject = $this->input->post();

            /* On stocke les données reçues dans un tableau avec comme clés les noms de colonnes dans la table project */
            $editDatas = array(
                'name' => $editProject['editName'],
                'description' => $editProject['editDesc'],
                'url' => $editProject['editURL'],
                'associated_image_url' => $editProject['editImageURL'],
                'status' => $editProject['editStatus']
            );

            /* Pour chaque clé du tableau correspondant à une colonne, pour un ID donné, on remplace les valeurs */
            foreach ($editDatas as $key => $value) {
                $this->adminManager->adminUpdate($key, $value, $editProject['editID'], 'project');
            }

            /* On envoie un tableau pour rafraichir les données des cards affichées */
            header('Content-type:application/json');
            echo json_encode(array(
                'projectRefreshID' => $editProject['editID'],
                'projectRefresh' => $editDatas,
            ));

        }
    }

    /* Fonction callback permettant de savoir si le nom de l'utilisateur est déjà pris */
    public function username_check($data) {

        $dateArray = array(
            'admin_name' => $data,
        );
        $pseudoChecker = $this->adminManager->checkExistUser($dateArray);

        if (!empty($pseudoChecker)) {
            $this->form_validation->set_message('username_check', 'Cet identifiant existe déjà.');
            return false;
        } else {
            return true;
        }

    }


}
