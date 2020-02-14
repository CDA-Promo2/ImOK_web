<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Appointment_model', 'Appointment_types_model', 'Employee_model', 'Customer_model']);
        $this->load->helper(['url', 'form', 'date']);
        $this->load->library(['form_validation', 'pagination','BreadcrumbComponent']);
    }

    // Méthode gérant la page d'accueil
    public function index() {

        // On passera dans le tableau data toutes les informations utiles pour la vue
        // Le titre de la page
        $data['title'] = "Liste des rendez-vous";
        $data['appointments'] = $this->Appointment_model->getAppointments();
        $data['appointment_types'] = $this->Appointment_types_model->getAll();
        $data['customers'] = $this->Customer_model->getCustomers();
        $data['employees'] = $this->Employee_model->getAll();
		$data['breadcrumb'] = $this->breadcrumbcomponent->add('Accueil', site_url())
																	  ->add('Liste des rendez-vous', site_url('appointment'))
                                                                      ->createView();
                                                                      
        //Configuration du calendrier
        foreach ($data['appointments'] as $key => $value) {
            $data['data'][$key]['title'] = $value->note;
            $data['data'][$key]['start'] = $value->date_start;
            $data['data'][$key]['firstnameCustomers'] = $value->firstnameCustomers;
            $data['data'][$key]['lastnameCustomers'] = $value->lastnameCustomers;
            $data['data'][$key]['firstnameEmployees'] = $value->firstnameEmployees;
            $data['data'][$key]['lastnameEmployees'] = $value->lastnameEmployees;
            $data['data'][$key]['description'] = $value->description;
            $data['data'][$key]['mailCustomers'] = $value->mailCustomers;
            $data['data'][$key]['phoneCustomers'] = $value->phoneCustomers;
            $data['data'][$key]['streetCustomers'] = $value->streetCustomers;
            $data['data'][$key]['citiesCustomers'] = $value->citiesCustomers;
            $data['data'][$key]['codeCustomers'] = $value->codeCustomers;
            $data['data'][$key]['backgroundColor'] = "#337ab7";
        }

        // Chargement des différentes vue, avec envoi du tableau data
        $this->load->view('common/_header', $data);
        $this->load->view('appointment/index', $data);
        $this->load->view('common/_footer', $data);
    }

    // Gère la page de création d'un credit
    public function create() {
        // Titre de la page
        $data['title'] = "Ajouter un Rendez-vous";
        // Récupération du crédit
        $data['appointments'] = $this->Appointment_model->getAppointments();
        $data['appointment_types'] = $this->Appointment_types_model->getAll();
        $data['customers'] = $this->Customer_model->getCustomers();
        $data['employees'] = $this->Employee_model->getAll();
        $data['breadcrumb'] = $this->breadcrumbcomponent->add('Accueil', site_url())
                                                        ->add('Liste des rendez-vous', site_url('appointment'))
                                                        ->add('Création des rendez-vous', site_url('appointment/create'))
                                                        ->createView();

    // Modification de l'affichage des erreurs
        $this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
    // S'il n'y a pas d'erreurs lors de l'application des règles de vérification
    // form_validation->run() renvoi TRUE si toutes les règles ont été appliquées sans erreurs
        // On appel la méthodes du model Users servant à la création d'un utilsilateur
        if ($this->form_validation->run() === TRUE) {

            $this->Appointment_model->createAppointments();
            redirect(base_url('index.php/appointment/'));
        
        }
        // Puis on se redirige vers la page d'accueil
        // Chargement des différentes vues servant à la création d'un utilisateur
        $this->load->view('common/_header', $data);
        $this->load->view('appointment/create', $data);
        $this->load->view('common/_footer', $data);
    }

             // Méthode gérant la modification d'un client
             public function edit($id = 0) {
                // Titre de la page
                $data['title'] = "Modification du rendez-vous ";
                // Récupération des données
                $data['appointments'] = $this->Appointment_model->getAppointments();
                $data['appointment_types'] = $this->Appointment_types_model->getAll();
                $data['customers'] = $this->Customer_model->getCustomers();
                $data['employees'] = $this->Employee_model->getAll();
                // Si le formulaire de modification a été submit
                if ($_POST) {
                    // Modification de l'affichage des erreurs
                    $this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
                    // S'il n'y a pas eu d'erreurs lors de l'application des règles de sécurités
                    if ($this->form_validation->run() === TRUE) {
                        // On appel la méthodes du model Client afin de mettre à jour le client d'id = $id
                        $this->Appointment_model->updateAppointments($id);
                        // Puis on se redirige vers l'accueil
                        redirect(base_url('index.php/appointment'));
                    }
                }
                // Récupération des informations du client choisi
                $data['appointment'] = $this->Appointment_model->getAppointmentById($id);
                // Si les informations sont vides, alors le client d'id = $id n'existe pas
                if (empty($data['appointment'])) {
                    show_404();
                } else {
                    // Affichage des vues correspondants à l'édition
                    $this->load->view('common/_header', $data);
                    $this->load->view('appointment/edit', $data);
                    $this->load->view('common/_footer', $data);
                }
            }

            // Méthodes gérant la suppression d'un rendez-vous
        public function delete() {
        // On récupère l'id du rendez-vous que l'on souhaite supprimer
        $id = $this->uri->segment(2);
        // S'il n'y a pas d'id -> page 404
        if (empty($id)) {
            show_404();
        } else {
            // On appel la méthodes du model Client afin de supprimer le rendez-vous d'id = $id
            $appointment = $this->Appointment_model->deleteAppointment($id);
            redirect(base_url('index.php/appointment'));
        }
    }

}
