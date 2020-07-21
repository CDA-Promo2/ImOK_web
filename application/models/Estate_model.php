<?php

class Estate_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	// Récupère tous les biens
	public function getAllEstates() {
		$query = $this->db->get('estate_view');
		return $query->result();
	}
	// Récupère un bien en fonction de son id
	public function getEstates($id) {
		$query = $this->db->get_where('estate_view',array('estate_view.id'=>$id));
		return $query->row();
	}
	// Créer un nouveau bien
	public function createEstate() {
		$data = [
			// Input partie 1
			'id_customers' =>  $this->input->post('id_customers'),
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
			'description' => $this->input->post('description'),
			// Input partie 2
			'rooms' => $this->input->post('room_string'),
			// Input partie 3
			'price' => $this->input->post('price'),
			'property_tax' => $this->input->post('property_tax'),
			'housing_tax' => $this->input->post('housing_tax'),
			'condominium_fees' => $this->input->post('condominium_fees'),
			'annual_fees' => $this->input->post('annual_fees'),
			'id_heating_types' => $this->input->post('id_heating_types'),
			'energy_consumption' => $this->input->post('energy_consumption'),
			'gas_emission' => $this->input->post('gas_emission'),
			// Input partie 4
			'facilities' => $this->input->post('facilities-array'),

		];

		//Purge les entrées vides (en faire une fonction ?)
		foreach ($data as $i => $value){
			if(empty($value)){
				unset($data[$i]);
			}
		}

		$data = $this->security->xss_clean($data);

		return $this->db->insert('estates', $data);
	}

	// Mettre à jour un bien
	public function updateEstate($id)
	{
		$data = [
			// Input partie 1
			'id_customers' =>  $this->input->post('id_customers'),
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
			'description' => $this->input->post('description'),
			// Input partie 2
			'rooms' => $this->input->post('room_string'),
			// Input partie 3
			'price' => $this->input->post('price'),
			'property_tax' => $this->input->post('property_tax'),
			'housing_tax' => $this->input->post('housing_tax'),
			'condominium_fees' => $this->input->post('condominium_fees'),
			'annual_fees' => $this->input->post('annual_fees'),
			'id_heating_types' => $this->input->post('id_heating_types'),
			'energy_consumption' => $this->input->post('energy_consumption'),
			'gas_emission' => $this->input->post('gas_emission'),
			// Input partie 4
			'facilities' => $this->input->post('facilities-array'),

		];

		//Purge les entrées vides (en faire une fonction ?)
		foreach ($data as $i => $value){
			if(empty($value)){
				unset($data[$i]);
			}
		}

		$data = $this->security->xss_clean($data);

		$this->db->where('id', $id);
		return $this->db->update('estates', $data);
	}

	// Supprimer un bien
	public function deleteEstate(){

	}
}
