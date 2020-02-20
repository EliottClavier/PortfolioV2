<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_project_add extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('portfolio_model', 'portfolioManager');
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
            'assets/js/admin/admin_project'
        ));

        $this->data['subview'] = 'front_office/admin/admin_project_add';

        $this->load->view('components_home/main', $this->data);

    }

    /* Fonction d'ajout d'un projet dans la BDD en fonction des données reçues du formulaire correspondant */
    public function addProject() {

        $rulesArray = array(
            array(
                'field' => 'addProjectName',
                'label' => 'concernant le nom du projet',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'addProjectDesc',
                'label' => 'concernant la description du projet',
                'rules' => 'trim|required|max_length[2000]'
            ),
            array(
                'field' => 'addProjectURL',
                'label' => 'concernant l\'URL menant au projet ',
                'rules' => 'trim|max_length[200]'
            ),
            array(
                'field' => 'addProjectImagePath',
                'label' => 'concernant l\'image associée au projet',
                'rules' => 'trim|required|max_length[200]'
            ),
            array(
                'field' => 'addProjectStatus',
                'label' => 'concernant le status du projet',
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

            /* On stocke les données reçues dans un tableau avec comme clés les noms de colonnes dans la table project */
            $data = array(
                'name' => $this->input->post('addProjectName'),
                'description' => $this->input->post('addProjectDesc'),
                'url' => $this->input->post('addProjectURL'),
                'associated_image_url' => $this->input->post('addProjectImagePath'),
                'status' => $this->input->post('addProjectStatus'),
            );

            /* On insère les données du tableau dans la table project*/
            $this->portfolioManager->insertDB('project', $data);
        }
    }

}
