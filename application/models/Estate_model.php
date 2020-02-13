<?php

class Estate_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	// Récupère tous les biens
	public function getAllEstates() {
		$query = $this->db->get('estates');
		return $query->result();
	}
	// Récupère un bien en fonction de son id
	public function getEstates($id) {
		$query = $this->db->get_where('estates',array('estates.id'=>$id));
		return $query->row();
	}
	// Créer un nouveau bien
	public function createEstate() {
		$data = [
			'id_customers' => $this->input->post('id_customers'),
//			'id_cities' => $this->input->post('id_cities'),
//			'id_districts' => $this->input->post('district'),
			'street' => $this->input->post('street'),
//			'id_outside_conditions' => $this->input->post('outside_conditions'),
//			'terrace' => $this->input->post('terrace'),
//			'id_estate_types' => $this->input->post('estate_types'),
//			'floor' => $this->input->post('floor'),
//			'id_build_Dates' => $this->input->post('build_date'),
//			'condominium' => $this->input->post('condominium'),
//			'floor_number' => $this->input->post('floor_number'),
//			'elevator' => $this->input->post('elevator'),
//			'parking' => $this->input->post('parking'),
//			'size' => $this->input->post('size'),
//			'carrez_size' => $this->input->post('carrez_size'),
//			'rooms_numbers' => $this->input->post('rooms_numbers'),
//			'bedroom_numbers' => $this->input->post('bedroom_numbers'),
//			'basement' => $this->input->post('basement')
		];
		$data = $this->security->xss_clean($data);
		return $this->db->insert('estates', $data);
	}
	// Mettre à jour un bien
	public function updateEstate(){

	}
	// Supprimer un bien
	public function deleteEstate(){

	}
}
