<?php

class Employee extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Employee_model');
	}

	public function index(){

		$data['title'] = "Accueil";

		$this->load->view('common/_header', $data);
		$this->load->view('employee/index', $data);
		$this->load->view('common/_footer', $data);

	}
}
