<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wall_covering_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function getAll() {
		$query = $this->db->get('wall_coverings');
		return $query->result();
	}
	public function getById($id) {
		$query = $this->db->get_where('wall_coverings', ['id' => $id]);
		return $query->row();
	}
}
