<?php

class Employee extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model(['Employee_model','Role_model','City_model']);
		$this->load->helper(['form','url']);
		$this->load->library(['form_validation', 'pagination','email']);
	}

	public function index() {


		if($_SESSION['user']->first_connection){
			redirect(site_url('employee/password/'.$_SESSION['user']->id));
		}


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

		if($this->input->post('id_cities')){
			$city = $this->City_model->getById($this->input->post('id_cities'));
			$data['city'] = $city->name.' ('.$city->zip_code.')';
		}

		$data['roles'] = $this->Role_model->getAll();
		$data['title'] = 'Enregistrer un nouvel employé';

		$this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');

		if ($this->form_validation->run() === TRUE) {
			//Génération d'un password aléatoire
			$random_password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&#!?') , 0 , 8 );
			//Création de l'employé
			$userId = $this->Employee_model->create($random_password);
			if($userId) {
				$user = $this->Employee_model->getById($userId);
				//envoi de l'email
				$this->email->send_employee_welcome($user,$random_password);

				//creation du message de validation et redirection
				$this->session->set_flashdata('validation_message', 'Le profil de ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ' a bien été enregistré.');
				redirect(base_url());
			}
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
			if($this->Employee_model->update($data['employee']->id)) {
				//creation du message de validation et redirection
				$this->session->set_flashdata('validation_message', 'Le profil de ' . $data['employee']->firstname . ' ' . $data['employee']->lastname . ' a bien été mis à jour.');
				redirect(base_url());
			}
		}


		$this->load->view('common/_header', $data);
		$this->load->view('employee/edit', $data);
		$this->load->view('common/_footer', $data);
	}

	public function password($id) {

		if($_SESSION['user']->id != $id){
			show_404();
		}

		$data['employee'] = $this->Employee_model->getById($id);
		$data['title'] = 'Modification de votre mot de passe';


		$this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');

		if ($this->form_validation->run() === TRUE) {
			$this->Employee_model->update_password($id);
			$this->session->set_flashdata('validation_message', 'Votre mot de passe a bien été mis à jour.');
			redirect(base_url());
		}

		$this->load->view('common/_header', $data);
		$this->load->view('employee/password', $data);
		$this->load->view('common/_footer', $data);

	}

	public function passwordrecovery($step=1){

		//first we check if the token is already in session
		if($step !=1 && !isset($_SESSION['recovery'])){
			redirect(site_url('employee/passwordrecovery/1'));
		}

		$data['noLoginRequired']=true;
		$data['title']="Mot de passe oublié";
		$data['step']=$step;

		$this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');

		if ($this->form_validation->run() === TRUE) {



			if($step == 1) {

				$user=$this->Employee_model->getByEmail($_POST['mail']);

				if ( !empty($user) ){

					//generate recovery code
					$token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&#!?') , 0 , 8 );

					//send mail
					$this->email->send_recovery_token($user,$token);

					//store email and recovery code hash in session
					$_SESSION['recovery']['mail'] = $_POST['mail'];
					$_SESSION['recovery']['token'] = password_hash($token, PASSWORD_DEFAULT);

					redirect(site_url('employee/passwordrecovery/2'));
				}
			}else {
				//check if sent recovery hash matches the hash in session
				if (password_verify($_POST['token'], $_SESSION['recovery']['token'])){

					//update user password
					$user=$this->Employee_model->getByEmail($_SESSION['recovery']['mail']);
					$this->Employee_model->update_password($user->id);

					//suppression des variables de session
					unset($_SESSION['recovery']);

					$this->session->set_flashdata('validation_message', 'Votre mot de passe a bien été modifié');
					redirect(site_url('login'));

				}else{
					$data['tokenError'] = "Le code de sécurité est invalide.";
				}

			}

		}


		$this->load->view('common/_header', $data);
		$this->load->view('employee/passwordrecovery', $data);
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
