<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $logged = false;
    public $appli_user = array();

	public function __construct()
	{
		parent::__construct();

        $this->load->library('layout');

        $this->load->model('admin_model', 'adminManager');

        $this->checkIfLoggedIn();

	}

    public function checkIfLoggedIn() {

        $user = $this->session->userdata('user');
        $email = $this->session->userdata('email');
        if($user && $email){
            $user = $this->adminManager->checkExistUser(array('admin_name' => $user, 'admin_mail' => $email));
            if($user){
                $this->appli_user = $user;
                $this->logged = true;
            }
        }

    }


}

class MY_Back extends CI_Controller {
	protected $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout');

		$this->data['css'] = $this->layout->add_css(array(
			'assets/plugins/bootstrap/css/bootstrap.min',
			'assets/css/styles',
		));
		$this->data['js'] = $this->layout->add_js(array(
			'assets/plugins/jquery-3.3.1.min',
			'assets/plugins/bootstrap/js/bootstrap.min',
			'assets/plugins/stickyfill/dist/stickyfill.min',
			'assets/js/main',
		));


	}
}
