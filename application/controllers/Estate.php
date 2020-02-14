<?php

defined('BASEPATH') OR exist('No direct script access allowed');

class Estate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Build_date_model', 'City_model', 'District_model',
			'Estate_model', 'Estate_types_model', 'Exposition_model', 'Heating_types_model',
			'Outside_conditions_model', 'Furniture_model', 'Room_type_model', 'Windows_type_model',
			'Ground_covering_model', 'Wall_covering_model', 'Heating_type_model', 'Customer_model']);
		$this->load->helper(['url', 'url_helper', 'form', 'date']);
		$this->load->library(['form_validation']);
	}
	public function index()
	{
		$data['title'] = 'Accueil de biens';
		$data['estateList'] = $this->Estate_model->getAllEstates();

		// Chargement des vues, avec envoi du tableau $data
		$this->load->view('common/_header', $data);
		$this->load->view('estate/index', $data);
		$this->load->view('common/_footer', $data);
	}
	public function create()
	{
		$data = $this->include();
		$data['title'] = 'Ajout d\'un bien';

		// Modification de l'affichage des erreurs
		$this->form_validation->set_error_delimiters('<br><small class="alert alert-danger p-1">', '</small>');
		// S'il n'y a pas d'erreurs lors de l'application des règles de vérification
		// form_validation->run() renvoi TRUE si toutes les règles ont été appliquées sans erreurs
		if ($this->form_validation->run() === TRUE) {
			$this->Estate_model->createEstate();
			$lastId = $this->db->insert_id();
			redirect(base_url('index.php/estate/edit/'.$lastId));
		}

		// Chargement des vues, avec envoi du tableau $data
		$this->load->view('common/_header', $data);
		$this->load->view('estate/create', $data);
		$this->load->view('common/_footer', $data);
	}
	public function edit($id)
	{
		$data = $this->include();
		$data['title'] = 'Fiche complète d\'un bien';

		// Récupère les info du biens et le de sa ville
		$data['estate'] = $this->Estate_model->getEstates($id);
		$data['cityInfo'] = $this->City_model->getById($data['estate']->id_cities);

		if ($_POST) {
			$this->uploadImage($id);
		}

		$this->load->view('common/_header', $data);
		$this->load->view('estate/edit', $data);
		$this->load->view('common/_footer', $data);
	}
	// Fonction utilisée par l'ajax
	public function search()
	{
		$term = $this->input->get('term');
		$this->db->like('name', $term);
		$this->db->or_like('zip_code', $term);
		$data = $this->db->get('cities')->result();
		echo json_encode($data);
	}
	public function details($id)
	{
		$data['title'] = 'Details bien';
		$data['estate'] = $this->Estate_model->getEstates($id);

		$this->load->view('common/_header', $data);
		$this->load->view('estate/details', $data);
		$this->load->view('common/_footer', $data);
	}
	private function include()
	{
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

		return $data;
	}
	public function uploadImage($id)
	{
		// On compte le nombre de photo
		$count = count($_FILES['estate_pic']['name']);
		// S'il n'existe pas, on crée le dossier
		if (!is_dir('upload/img/estate/'.$id)) {
			mkdir('./upload/img/estate/' . $id, 0775, TRUE);
		}

		for($i=0;$i<$count;$i++)
		{
			if(!empty($_FILES['estate_pic']['name'][$i]))
			{
				$_FILES['file']['name'] = $_FILES['estate_pic']['name'][$i];
				$_FILES['file']['type'] = $_FILES['estate_pic']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['estate_pic']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['estate_pic']['error'][$i];
				$_FILES['file']['size'] = $_FILES['estate_pic']['size'][$i];

				// Config de l'upload
				$config['upload_path'] = 'upload/img/estate/'.$id;
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '2048';
				$config['file_name'] = $_FILES['estate_pic']['name'][$i];

				$this->load->library('upload',$config);

				$this->upload->do_upload('file');

			}
		}
	}
}
