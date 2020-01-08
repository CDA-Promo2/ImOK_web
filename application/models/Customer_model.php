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
            'mail' => $this->input->post('mail'),
            'birthdate' => $this->input->post('birthdate'),
            'date_register' => $this->input->post('date_register'),
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

        // Méthode pour récupérer les info d'un client
        public function getClientById($id) {
            $this->db->select(['customers.*', 'marital_status.name as name_status', 'cities.name as name_cities', 'cities.zip_code as zipcode']);
            $this->db->join('marital_status', 'customers.id_marital_status = marital_status.id');
            $this->db->join('cities', 'customers.id_cities = cities.id');
            $this->db->where('customers.id', $id);
            $query = $this->db->get('customers');
            return $query->row();
        }

        public function updateCustomer($id) {
            $data = array(
                'lastname' => $this->input->post('lastname'),
                'firstname' => $this->input->post('firstname'),
                'birthdate' => $this->input->post('birthdate'),
                'mail' => $this->input->post('mail'),
                'street' => $this->input->post('street'),
                'phone' => $this->input->post('phone'),
                'id_marital_Status' => $this->input->post('id_marital_Status'),
                'id_cities' => $this->input->post('id_cities'),
            );
            $this->db->where('id', $id);
            $data = $this->security->xss_clean($data);
            return $this->db->update('customers', $data);
        }
}
