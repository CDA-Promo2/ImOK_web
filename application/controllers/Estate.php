<?php

defined('BASEPATH') OR exist('No direct script access allowed');

class Estate extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['Build_date_model', 'City_model', 'District_model', 'Estate_model', 'Estate_types_model', 'Exposition_model', 'Heating_types_model', 'Outside_conditions_model']);
		$this->load->helper(['url', 'form', 'date']);
//		$this->load->library('form_library');
	}


	public function index(){
		$data['title'] = 'Accueil de biens';

		// Chargement des vues, avec envoi du tableau $data
		$this->load->view('common/_header', $data);
		$this->load->view('estate/index', $data);
		$this->load->view('common/_footer', $data);
	}

	public function create(){
		$data['title'] = 'Ajout d\'un nouveau bien !';
		$data['cities']	= $this->City_model->getAll();
		$data['dates']	= $this->Build_date_model->getAll();

		// Chargement des vues, avec envoi du tableau $data
		$this->load->view('common/_header', $data);
		$this->load->view('estate/create', $data);
		$this->load->view('common/_footer', $data);
	}

}
