<?php
class Mandate_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

            public function getClientByEmployee($id) {
            $this->db->select(['mandates.*', 'customers.*']);
            $this->db->join('customers', 'mandates.id_customers = customers.id');
            $this->db->join('cities', 'customers.id_cities = cities.id');
            $this->db->join('employees', 'mandates.id_employees = employees.id');
            $this->db->join('marital_status', 'customers.id_marital_status = marital_status.id');
            $this->db->where('employees.id', $id);
            $query = $this->db->get('customers');
            return $query->row();
        }

}