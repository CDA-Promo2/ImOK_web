<?php

class Employee extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model(['Employee_model','Role_model']);
		$this->load->helper('form','url');
		$this->load->library(['form_validation', 'pagination']);
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

		if($_SESSION['user']->id_roles != 1){
			show_404();
		}

		$data['title'] = 'Liste des employés';

		$data['employees'] = $this->Employee_model->getAll();

		$this->load->view('common/_header', $data);
		$this->load->view('employee/list', $data);
		$this->load->view('common/_footer', $data);
	}

	public function create(){

		if($_SESSION['user']->id_roles !=1){
			show_404();
		}

		$data['roles'] = $this->Role_model->getAll();
		$data['title'] = 'Enregistrer un nouvel employé';

		$this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');

		if ($this->form_validation->run() === TRUE) {
			//Génération d'un password aléatoire
			$random_password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&#!?') , 0 , 8 );
			//Création de l'employé
			$this->Employee_model->create($random_password);
			redirect(base_url());
		}

		$this->load->view('common/_header', $data);
		$this->load->view('employee/create', $data);
		$this->load->view('common/_footer', $data);


	}

	public function edit($id){

		if($_SESSION['user']->id != $id && $_SESSION['user']->id_roles !=1){
			show_404();
		}

		$data['employee'] = $this->Employee_model->getById($id);
		$data['roles'] = $this->Role_model->getAll();
		$data['title'] = 'Profil de '.$data['employee']->firstname.' '.$data['employee']->lastname;

		$this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');

		if ($this->form_validation->run() === TRUE) {
			//update du user
			die('update should be fine');
			redirect(base_url());

		}

		$this->load->view('common/_header', $data);
		$this->load->view('employee/edit', $data);
		$this->load->view('common/_footer', $data);

	}
}
