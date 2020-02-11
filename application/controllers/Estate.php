<?php

defined('BASEPATH') OR exist('No direct script access allowed');

class Estate extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model(['Build_date_model', 'City_model', 'District_model',
			'Estate_model', 'Estate_types_model', 'Exposition_model', 'Heating_types_model',
			'Outside_conditions_model', 'Furniture_model', 'Room_type_model', 'Windows_type_model',
			'Ground_covering_model', 'Wall_covering_model', 'Heating_type_model', 'Customer_model']);
		$this->load->helper(['url', 'url_helper', 'form', 'date']);
		$this->load->library(['form_validation']);
	}
	public function index() {
		$data['title'] = 'Accueil de biens';
		$data['estateList'] = $this->Estate_model->getAllEstates();

		// Chargement des vues, avec envoi du tableau $data
		$this->load->view('common/_header', $data);
		$this->load->view('estate/index', $data);
		$this->load->view('common/_footer', $data);
	}
	public function create() {
		$data['title'] = 'Ajout d\'un bien';

		$data['cities']	= $this->City_model->getAll();
		$data['dates']	= $this->Build_date_model->getAll();
		$data['furnituresList'] = $this->Furniture_model->getAll();
		$data['roomTypeList'] = $this->Room_type_model->getAll();
		$data['windowsTypeList'] = $this->Windows_type_model->getAll();
		$data['groundCoveringsList'] = $this->Ground_covering_model->getAll();
		$data['wallCoveringsList'] = $this->Wall_covering_model->getAll();
		$data['heatingTypesList'] = $this->Heating_type_model->getAll();
		$data['outsideConditionList'] = $this->Outside_conditions_model->getAll();
		$data['customerList'] = $this->Customer_model->getCustomers();
		$data['estateTypeList'] = $this->Estate_types_model->getAll();
		$data['expositionsList'] = $this->Exposition_model->getAll();

		// Modification de l'affichage des erreurs
		$this->form_validation->set_error_delimiters('<br><small class="alert alert-danger p-1">', '</small>');
		// S'il n'y a pas d'erreurs lors de l'application des règles de vérification
		// form_validation->run() renvoi TRUE si toutes les règles ont été appliquées sans erreurs
		if ($this->form_validation->run() === TRUE) {
			$this->Estate_model->createEstate();
			$lastId = $this->db->insert_id();
			redirect(base_url('index.php/estate/details/'.$lastId));
		}

		// Chargement des vues, avec envoi du tableau $data
		$this->load->view('common/_header', $data);
		$this->load->view('estate/create', $data);
		$this->load->view('common/_footer', $data);
	}
	public function search() {
		$term = $this->input->get('term');
		$this->db->like('name', $term);
		$this->db->or_like('zip_code', $term);
		$data = $this->db->get('cities')->result();
		echo json_encode($data);
	}
	public function edit($id){
		$data['title'] = 'Modification d\'un bien';

		$data['cities']	= $this->City_model->getAll();
		$data['dates']	= $this->Build_date_model->getAll();
		$data['furnituresList'] = $this->Furniture_model->getAll();
		$data['roomTypeList'] = $this->Room_type_model->getAll();
		$data['windowsTypeList'] = $this->Windows_type_model->getAll();
		$data['groundCoveringsList'] = $this->Ground_covering_model->getAll();
		$data['wallCoveringsList'] = $this->Wall_covering_model->getAll();
		$data['heatingTypesList'] = $this->Heating_type_model->getAll();
		$data['outsideConditionList'] = $this->Outside_conditions_model->getAll();
		$data['customerList'] = $this->Customer_model->getCustomers();
		$data['estateTypeList'] = $this->Estate_types_model->getAll();

		$data['estate'] = $this->Estate_model->getEstates($id);

		$this->load->view('common/_header', $data);
		$this->load->view('estate/edit', $data);
		$this->load->view('common/_footer', $data);
	}
	public function details($id) {
		$data['title'] = 'Details bien';
		$data['estate'] = $this->Estate_model->getEstates($id);

		$this->load->view('common/_header', $data);
		$this->load->view('estate/details', $data);
		$this->load->view('common/_footer', $data);
	}
}
