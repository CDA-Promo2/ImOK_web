<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Employee_model');
	}

	public function index()
	{

		//check if the user is already logged in
		if(isset($_SESSION['user']) && !$this->input->post('logout',TRUE)){
			redirect(site_url(),'refresh');
		}

		//check if the user logged out
		if($this->input->post('logout',TRUE)){
			$_SESSION = [];
			session_destroy();
			redirect(site_url('login'), 'refresh');
		}

		//check if the user tried to log in
		if($this->input->post('login',TRUE)){
			$mail = $this->input->post('mail');
			$password = $this->input->post('password');
			$userConnected = $this->Login_model->validate($mail,$password);
			if($userConnected){
				$_SESSION['user']= $this->Employee_model->getById($userConnected->id);
				$_SESSION['role']=$this->Employee_model->getRole($_SESSION['user']->id_roles);
				redirect(site_url(), 'refresh');
			}else{
				$data['formError']='Addresse mail ou mot de passe invalide';
			}
		}

		//load login view
		$data['title']='Connexion';
		$this->load->view('common/_header',$data);
		$this->load->view('login/index',$data);
		$this->load->view('common/_footer',$data);
	}

}

/* End of file Controllername.php */
