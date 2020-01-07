<?php
class Customer_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function getCustomers() {
        $this->db->select(['customers.*', 'firstname', 'lastname', 'street', 'complement', 'phone', 'mail', 'cities.name as name_cities', 'marital_status.name name_status', 'zip_code', 'civility']);
        $this->db->join('cities', 'cities.id = customers.id_cities');
        $this->db->join('marital_status', 'marital_status.id = customers.id_marital_status');
        $query = $this->db->get('Customers');
        return $query->result();
    }

    public function createCustomers() {
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'street' => $this->input->post('street'),
            'complement' => $this->input->post('complement'),
            'phone' => $this->input->post('phone'),
            'mail' => $this->input->post('mail'),
            'id_Marital_Status' => $this->input->post('id_Marital_Status'),
            'id_cities' => $this->input->post('id_cities'),
        ];
        $data = $this->security->xss_clean($data);
        return $this->db->insert('Customer', $data);
    }

    public function deleteCustomer($id) {
        $this->db->where('id', $id);
        return $this->db->delete('customers');
    }
}
