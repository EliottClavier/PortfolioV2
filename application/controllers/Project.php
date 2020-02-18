<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project  extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('portfolio_model', 'portfolioManager');
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
            'assets/js/main_features',
            'assets/js/projects'
        ));

        $this->data['completed_projects'] = $this->portfolioManager->getTable('project', 'status', 'completed');
        $this->data['progress_projects'] = $this->portfolioManager->getTable('project', 'status', 'progress');

        $this->data['subview'] = 'front_office/project';

        $this->load->view('components_home/main', $this->data);

    }


}
