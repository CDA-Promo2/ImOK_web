<?php

class Estate_model extends CI_Model {

	public function __construct()
	{
		// Connexion à la BDD
		$this->load->database();
	}
	// Récupère tous les biens
	public function getAllEstates()
	{
		$query = $this->db->get('estates');
		return $query->result();
	}
	// Récupère un bien en fonction de son id
	public function getEstates($id)
	{
		$query = $this->db->get_where('estates',array('estates.id'=>$id));
		return $query->row();
	}
	// Créer un nouveau bien
	public function createEstate()
	{
		$data = [
			'id_customers' => $this->input->post('id_customers'),
			'id_cities' => $this->input->post('id_cities'),
			'street' => $this->input->post('street'),
			'complement' => $this->input->post('complement'),
			'renovation' => $this->input->post('renovation'),
			'id_estate_types' => $this->input->post('id_estate_types'),
			'floor' => $this->input->post('floor'),
			'id_build_dates' => $this->input->post('id_build_dates'),
			'condominium' => $this->input->post('condominium'),
			'joint_ownership' => $this->input->post('joint_ownership'),
			'floor_number' => $this->input->post('floor_number'),
			'id_expositions' => $this->input->post('id_expositions'),
			'size' => $this->input->post('size'),
			'carrez_size' => $this->input->post('carrez_size'),
			'rooms_numbers' => $this->input->post('rooms_numbers'),
			'bedroom_numbers' => $this->input->post('bedroom_numbers'),
			'id_outside_conditions' => $this->input->post('id_outside_conditions'),
		];
		$data = $this->security->xss_clean($data);
		return $this->db->insert('estates', $data);
	}
	// Mettre à jour un bien
	public function updateEstate()
	{

	}

	public function insertImage ()
	{

	}
	// Supprimer un bien
	public function deleteEstate()
	{

	}
}
