<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function getAll() {
		$query = $this->db->get('facilities');
		return $query->result();
	}
	public function getById($id) {
		$query = $this->db->get_where('facilities', ['id' => $id]);
		return $query->row();
	}
}
