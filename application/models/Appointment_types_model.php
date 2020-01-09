<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_types_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function getAll() {
		$query = $this->db->get('appointment_types');
		return $query->result();
	}
}
