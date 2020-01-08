<?php

defined('BASEPATH') OR exist('No direct script access allowed');

class Estate extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model(['Build_date_model', 'City_model', 'District_model',
			'Estate_model', 'Estate_types_model', 'Exposition_model', 'Heating_types_model',
			'Outside_conditions_model', 'Furniture_model', 'Room_type_model', 'Windows_type_model',
			'Ground_covering_model', 'Wall_covering_model', 'Heating_type_model']);
		$this->load->helper(['url', 'url_helper', 'form', 'date']);
	}
	public function index() {
		$data['title'] = 'Accueil de biens';

		// Chargement des vues, avec envoi du tableau $data
		$this->load->view('common/_header', $data);
		$this->load->view('estate/index', $data);
		$this->load->view('common/_footer', $data);
	}
	public function create() {
		$data['title'] = 'Ajout d\'un nouveau bien !';
		$data['cities']	= $this->City_model->getAll();
		$data['dates']	= $this->Build_date_model->getAll();
		$data['furnituresList'] = $this->Furniture_model->getAll();
		$data['roomTypeList'] = $this->Room_type_model->getAll();
		$data['windowsTypeList'] = $this->Windows_type_model->getAll();
		$data['groundCoveringsList'] = $this->Ground_covering_model->getAll();
		$data['wallCoveringsList'] = $this->Wall_covering_model->getAll();
		$data['heatingTypesList'] = $this->Heating_type_model->getAll();
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
}
