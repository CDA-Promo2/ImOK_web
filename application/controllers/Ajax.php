<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Appointment_model', 'Appointment_types_model', 'Employee_model', 'Customer_model']);
		$this->load->helper(['url', 'form', 'date']);
	}

	/**
	 * Permet à Ajax de récupérer les données des villes avec une requete sur leur nom
	 */
	public function city(){
		$term = $this->input->get('term');
		$this->db->like('name', $term);
		$data = $this->db->get('cities')->result();
		echo json_encode($data);
	}

}
