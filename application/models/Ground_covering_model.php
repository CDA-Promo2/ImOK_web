<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ground_covering_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function getAll() {
		$query = $this->db->get('ground_coverings');
		return $query->result();
	}
	public function getById($id) {
		$query = $this->db->get_where('ground_coverings', ['id' => $id]);
		return $query->row();
	}
}
