<?php

class Employee extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Employee_model');
	}

	public function index(){

		$data['title'] = 'Accueil';
		$data['role'] = $this->Employee_model->getRole($_SESSION['user']->id_roles);

		$data['dashboard'][2] = array('performance','agenda','estate','customer','message');
		$data['dashboard'][3] = array('agenda','performance','estate','customer','message');
		$data['dashboard'][4] = array('customer','agenda','estate','performance','message');

		$this->load->view('common/_header', $data);
		$this->load->view('employee/index', $data);
		$this->load->view('common/_footer', $data);

	}

	public function list(){
		$data['title'] = 'Liste des employés';

		$data['employees'] = $this->Employee_model->getAll();

		$this->load->view('common/_header', $data);
		$this->load->view('employee/list', $data);
		$this->load->view('common/_footer', $data);
	}

	public function details($id){

		$data['employee'] = $this->Employee_model->getById($id);
		$data['title'] = 'Profil de '.$data['employee']->firstname.' '.$data['employee']->lastname;

		$this->load->view('common/_header', $data);
		$this->load->view('employee/details', $data);
		$this->load->view('common/_footer', $data);

	}
}
