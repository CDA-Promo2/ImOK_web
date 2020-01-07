<?php
class Status extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

public function getStatus() {
        $query = $this->db->get('marital_Status');
        return $query->result();
    }

}