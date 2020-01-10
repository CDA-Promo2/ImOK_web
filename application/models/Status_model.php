<?php
class Status_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

	public function getStatus() {
        $query = $this->db->get('marital_status');
        return $query->result();
    }

}
