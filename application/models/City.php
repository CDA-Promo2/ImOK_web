<?php
class City extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

public function getCities() {
        $query = $this->db->get('cities');
        return $query->result();
    }

}