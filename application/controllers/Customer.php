<?php
defined('BASEPATH') OR exist('No direct script access allowed');
class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Customer_model', 'City_model', 'Status_model']);
        $this->load->helper(['url', 'form', 'date']);
        $this->load->library(['form_validation', 'pagination']);
    }
    // Méthode gérant la page d'accueil
    public function index() {
        // On passera dans le tableau data toutes les informations utiles pour la vue
        // Le titre de la page
        $data['title'] = "Liste des clients";
        $data['customers'] = $this->Customer_model->getCustomers();
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
            // $data['cities'] = $this->City_model->getAll();

        // Modification de l'affichage des erreurs
            $this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
        // S'il n'y a pas d'erreurs lors de l'application des règles de vérification
        // form_validation->run() renvoi TRUE si toutes les règles ont été appliquées sans erreurs
            // On appel la méthodes du model Users servant à la création d'un utilsilateur
            if ($this->form_validation->run() === TRUE) {

                $this->Customer_model->createCustomers();
                redirect(base_url());
            
            }
            // Puis on se redirige vers la page d'accueil
            // Chargement des différentes vues servant à la création d'un utilisateur
            $this->load->view('common/_header', $data);
            $this->load->view('customer/create', $data);
            $this->load->view('common/_footer', $data);
        }

        // Méthodes gérant la suppression d'un client
        public function delete() {
        // On récupère l'id du client que l'on souhaite supprimer
        $id = $this->uri->segment(2);
        // S'il n'y a pas d'id -> page 404
        if (empty($id)) {
            show_404();
        } else {
            // On appel la méthodes du model Client afin de supprimer le client d'id = $id
            $customer = $this->Customer->deleteCustomer($id);
            redirect('');
        }
    }
}
