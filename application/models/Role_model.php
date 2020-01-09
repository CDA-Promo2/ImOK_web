<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getAll(){
		$query = $this->db->get('roles');
		return $query->result();
	}

}

/* End of file .php */
