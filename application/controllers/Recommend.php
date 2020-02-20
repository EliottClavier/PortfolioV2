<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recommend extends MY_Controller {

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
        ));

        /* On récupère les recommendations validées */
        $this->data['recommendations'] = $this->portfolioManager->getTable('recommend', 'status', 'verified');


        $this->data['subview'] = 'front_office/recommend';

        $this->load->view('components_home/main', $this->data);

    }


}
