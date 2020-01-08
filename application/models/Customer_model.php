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
            'civility' => $this->input->post('civility'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'street' => $this->input->post('street'),
            'complement' => $this->input->post('complement'),
            'phone' => $this->input->post('phone'),
            'mail' => $this->input->post('mail'),
            'id_marital_status' => $this->input->post('id_marital_status'),
            'id_cities' => $this->input->post('id_cities'),
        ];
        $data = $this->security->xss_clean($data);
        return $this->db->insert('customers', $data);
    }

    public function deleteCustomer($id) {
        $this->db->where('id', $id);
        return $this->db->delete('customers');
    }
}
