<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Outside_conditions_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		$query = $this->db->get('Outside_conditions');
		return $query->result();
	}

	public function getById($id) {
		$query = $this->db->get_where('Outside_conditions', ['id' => $id]);
		return $query->row();
	}
}
