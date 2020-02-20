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
            'assets/plugins/animsition/dist/css/animsition.min',
            'assets/css/styles',
        ));
        // Chargement des JS
        $this->data['js'] = $this->layout->add_js(array(
            'assets/plugins/jquery-3.3.1.min',
            'assets/plugins/bootstrap/js/bootstrap.min',
            'assets/plugins/animsition/dist/js/animsition.min',
            'assets/js/animsition',
            'assets/js/main_features',
            'assets/js/main_form',
        ));

        /* Sélection au hasard d'un projet sur toutes les valeurs disponibles sauf les projets en statut hors-ligne*/
        $projects = $this->portfolioManager->getTable('project' ,'status !=', 'offline');
        if (!(empty($projects))) {
            $random = array_rand($projects);
            $this->data['random_project'] = $projects[$random];
        }

        /* Sélection des données pour la section compétences */
        $this->data['languages'] = $this->portfolioManager->getTable('skills', 'category', 'language');
        $this->data['tools'] = $this->portfolioManager->getTable('skills', 'category', 'tool');

        /* Sélection des données pour la section ma formation et mes expériences professionnelles */
        $this->data['formations'] = $this->portfolioManager->getTable('timeline', 'category', 'formation');
        $this->data['experiences'] = $this->portfolioManager->getTable('timeline', 'category', 'experience');

        $this->data['subview'] = 'index';

        $this->load->view('components_home/main', $this->data);

    }

    /* Fonction de vérification du formulaire de contact et d'envoi de mail à l'adresse spécifiée dans email.php */
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
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'contactEmail',
                'label' => 'concernant votre email',
                'rules' => 'trim|required|valid_email|max_length[75]'
            ),
            array(
                'field' => 'contactObject',
                'label' => 'concernant l\'object de votre message',
                'rules' => 'trim|required|max_length[200]'
            ),
            array(
                'field' => 'contactText',
                'label' => 'concernant votre message',
                'rules' => 'trim|required|max_length[2000]'
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

            /* On crée un tableau où on stocke les données reçues */
            $setData = array(
                'name' => $data['contactName'],
                'first_name' => $data['contactFirstName'],
                'company_name' => $data['contactCompanyName'],
                'email' => $data['contactEmail'],
                'message_object' => $data['contactObject'],
                'message_text' => $data['contactText'],
            );

            /* On charge la librarie email */
            $this->load->library('email');

            /* On crée le mail à envoyer en fonction des données envoyés par le formulaire */
            $this->email->from(htmlspecialchars($setData['email']), htmlspecialchars($setData['name'])
            . ' ' . htmlspecialchars($setData['first_name']) . ' - ' . htmlspecialchars($setData['company_name']));
            $this->email->to('eliott.clavier.redirection@eliott-clavier.com');
            $this->email->subject(htmlspecialchars($setData['message_object']));
            $this->email->message(htmlspecialchars($setData['message_text']) . "\r\n" . htmlspecialchars($setData['email']));
            $this->email->send();

        }

    }

    /* Fonction de vérification du recommendation de contact et de stockage dans la BDD */
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
                'rules' => 'trim|required|max_length[100]'
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
                'rules' => 'trim|required|max_length[2000]'
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

            /* On crée un tableau où on stocke les données reçues */
            $setData = array(
                'name' => $data['recommendName'],
                'first_name' => $data['recommendFirstName'],
                'company_name' => $data['recommendCompanyName'],
                'email' => $data['recommendEmail'],
                'date_start' => $data['recommendStart'],
                'date_end' => $data['recommendEnd'],
                'date_created' => date("Y-m-d H:i:s"),
                'message_text' => $data['recommendText'],
            );

            /* On insère les données reçues */
            $this->portfolioManager->insertDB('recommend', $setData);

        }

    }
}
