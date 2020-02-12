<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		// Chargement des CSS
		$this->data['css'] = $this->layout->add_css(array(
			'assets/plugins/bootstrap/css/bootstrap.min',
			'assets/plugins/elegant_font/css/style',
			'assets/css/styles',
		));
		// Chargement des JS
		$this->data['js'] = $this->layout->add_js(array(
			'assets/plugins/jquery-3.3.1.min',
			'assets/plugins/bootstrap/js/bootstrap.min',
		));

		// Chargement de la vue
		$this->data['subview'] = 'index';


		$this->load->view('components_home/main', $this->data);

	}
}
