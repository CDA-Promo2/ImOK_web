<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Windows_type_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function getAll() {
		$query = $this->db->get('windows_types');
		return $query->result();
	}
	public function getById($id) {
		$query = $this->db->get_where('windows_types', ['id' => $id]);
		return $query->row();
	}
}
