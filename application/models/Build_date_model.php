<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Build_date_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function getAll() {
		$query = $this->db->get('build_dates');
		return $query->result();
	}
	public function getById($id) {
		$query = $this->db->get_where('build_dates', ['id' => $id]);
		return $query->row();
	}
}
