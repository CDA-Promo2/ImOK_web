<?php
defined('BASEPATH') OR exist('No direct script access allowed');
class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Customer_model', 'City_model', 'Status_model', 'Appointment_model', 'Mandate_model']);
        $this->load->helper(['url', 'form', 'date']);
        $this->load->library(['form_validation', 'pagination','breadcrumbComponent']);
    }
    // Méthode gérant la page d'accueil
    public function index() {
        // On passera dans le tableau data toutes les informations utiles pour la vue
        // Le titre de la page
        $data['title'] = "Liste des clients";

        //Récupération de tout les clients
        $data['customers'] = $this->Customer_model->getCustomers();
        $data['breadcrumb'] = $this->breadcrumbcomponent->add('Accueil', site_url())
                                                        ->add('Liste des clients', site_url('customer'))
                                                        ->createView();

        //configuration de la pagination
        $this->load->config('pagination');
        $config = $this->config->item('pagination_config');
        $config['total_rows'] = $this->Customer_model->countAll();
        $config['base_url'] = site_url('customer/index');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        // Chargement des différentes vue, avec envoi du tableau data
        $this->load->view('common/_header', $data);
        $this->load->view('customer/index', $data);
        $this->load->view('common/_footer', $data);
    }


        // Gère la page de création d'un credit
        public function create() {
            // Titre de la page
            $data['title'] = "Ajouter un Client";
            // Récupération du crédit
            $data['marital_status'] = $this->Status_model->getStatus();
            $data['breadcrumb'] = $this->breadcrumbcomponent->add('Accueil', site_url())
                                                            ->add('Liste des clients', site_url('customer'))
                                                            ->add('Création du client', site_url('customer/create'))
                                                            ->createView();
            // $data['cities'] = $this->City_model->getAll();

        // Modification de l'affichage des erreurs
            $this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
        // S'il n'y a pas d'erreurs lors de l'application des règles de vérification
        // form_validation->run() renvoi TRUE si toutes les règles ont été appliquées sans erreurs
            // On appel la méthodes du model Users servant à la création d'un utilsilateur
            if ($this->form_validation->run() === TRUE) {

                $this->Customer_model->createCustomers();
                redirect(base_url('index.php/customer/'));

            }
            // Puis on se redirige vers la page d'accueil
            // Chargement des différentes vues servant à la création d'un utilisateur
            $this->load->view('common/_header', $data);
            $this->load->view('customer/create', $data);
            $this->load->view('common/_footer', $data);
        }

        //Methode gérant la page details
        public function details($id = 0) {
            $data['title'] = 'Informations du client';
            $data['client'] = $this->Customer_model->getClientById($id);            
            $data['appointements'] = $this->Appointment_model->getAppointmentByIdCustomers($id); 
            $data['breadcrumb'] = $this->breadcrumbcomponent->add('Accueil', site_url())
                                                            ->add('Liste des clients', site_url('customer'))
                                                            ->add('Information du client', site_url('customer/details'))
                                                            ->createView();           
            
            $this->load->view('common/_header', $data);
            $this->load->view('customer/details', $data);
            $this->load->view('common/_footer', $data);
        }

         // Méthode gérant la modification d'un client
    public function edit($id = 0) {
        // Titre de la page
        $data['title'] = "Modification des informations sur ";
        // Récupération des status
        $data['marital_status'] = $this->Status_model->getStatus();
        $data['cities'] = $this->City_model->getAll();
        $data['breadcrumb'] = $this->breadcrumbcomponent->add('Accueil', site_url())
                                                        ->add('Liste des clients', site_url('customer'))
                                                        ->add('Modification du client', site_url('customer/edit'))
                                                        ->createView();  
        // Si le formulaire de modification a été submit
        if ($_POST) {
            // Modification de l'affichage des erreurs
            $this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
            // S'il n'y a pas eu d'erreurs lors de l'application des règles de sécurités
            if ($this->form_validation->run() === TRUE) {
                // On appel la méthodes du model Client afin de mettre à jour le client d'id = $id
                $this->Customer_model->updateCustomer($id);
                // Puis on se redirige vers l'accueil
                redirect(base_url('index.php/customer/'));
            }
        }
        // Récupération des informations du client choisi
        $data['client'] = $this->Customer_model->getClientById($id);
        // Si les informations sont vides, alors le client d'id = $id n'existe pas
        if (empty($data['client'])) {
            show_404();
        } else {
            // Affichage des vues correspondants à l'édition
            $this->load->view('common/_header', $data);
            $this->load->view('customer/edit', $data);
            $this->load->view('common/_footer', $data);
        }
    }

    public function search() {
		$term = $this->input->get('term');
		$this->db->like('name', $term);
		$this->db->or_like('zip_code', $term);
		$data = $this->db->get('cities')->result();
		echo json_encode($data);
	}
}
