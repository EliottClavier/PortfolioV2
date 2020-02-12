<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

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
            'assets/js/features',
            'assets/js/form',
        ));

        /*
        $timezone = date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d h:i:s a', time());
        echo $date;
        */

        $this->data['subview'] = 'front_office/main';

        $this->load->view('components_home/main', $this->data);

    }

    public function formContact() {

	    $data = $this->input->post();

        $rulesArray = array(
            array(
                'field' => 'contactName',
                'label' => 'concernant votre nom',
                'rules' => 'trim|required|max_length[75]'
            ),
            array(
                'field' => 'contactFirstName',
                'label' => 'concernant votre prénom',
                'rules' => 'trim|required|max_length[75]'
            ),
            array(
                'field' => 'contactCompanyName',
                'label' => 'concernant le nom de votre l\'entreprise',
                'rules' => 'trim|required|max_length[75]'
            ),
            array(
                'field' => 'contactEmail',
                'label' => 'concernant votre email',
                'rules' => 'trim|required|valid_email|max_length[75]'
            ),
            array(
                'field' => 'contactObject',
                'label' => 'concernant l\'object de votre message',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'contactText',
                'label' => 'concernant votre message',
                'rules' => 'trim|required|max_length[500]'
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

            $setData = array(

                'name' => $data['contactName'],
                'first_name' => $data['contactFirstName'],
                'company_name' => $data['contactCompanyName'],
                'email' => $data['contactEmail'],
                'message_object' => $data['contactObject'],
                'message_text' => $data['contactText'],

            );

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'clavier.eliott.el@gmail.com',
                'smtp_pass' => 'Eclavier310801',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
            );
            $this->load->library('email');


            $this->email->from($setData['email'], $setData['name'] . ' ' . $setData['first_name'] . ' - ' . $setData['company_name']);
            $this->email->to('eliott.clavier@students.campus');
            $this->email->subject($setData['message_object']);
            $this->email->message($setData['message_text']);
            $this->email->send();

            $this->email->send();
            echo $this->email->print_debugger();



            // $this->portfolioManager->formComplete('contact', $setData);

        }

    }

    public function formRecommend() {

        $data = $this->input->post();

        $rulesArray = array(
            array(
                'field' => 'recommendName',
                'label' => 'concernant votre nom',
                'rules' => 'trim|required|max_length[75]'
            ),
            array(
                'field' => 'recommendFirstName',
                'label' => 'concernant votre prénom',
                'rules' => 'trim|required|max_length[75]'
            ),
            array(
                'field' => 'recommendCompanyName',
                'label' => 'concernant le nom de votre l\'entreprise',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'recommendEmail',
                'label' => 'concernant votre email',
                'rules' => 'trim|required|valid_email|max_length[75]'
            ),
            array(
                'field' => 'recommendStart',
                'label' => 'concernant la date de début de notre collaboration',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'recommendEnd',
                'label' => 'concernant la date de fin de notre collaboration',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'recommendText',
                'label' => 'concernant votre message',
                'rules' => 'trim|required|max_length[500]'
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

            $setData = array(

                'name' => $data['recommendName'],
                'first_name' => $data['recommendFirstName'],
                'company_name' => $data['recommendCompanyName'],
                'email' => $data['recommendEmail'],
                'date_start' => $data['recommendStart'],
                'date_end' => $data['recommendEnd'],
                'message_text' => $data['recommendText'],

            );

            $this->portfolioManager->formComplete('recommend', $setData);

        }

    }
}
