<?php
class Customer_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function getCustomers() {
        $this->db->select(['customers.*', 'firstname', 'lastname', 'street', 'complement', 'phone', 'mail', 'cities.name as name_cities', 'marital_status.name name_status', 'zip_code', 'civility']);
        $this->db->join('cities', 'cities.id = customers.id_cities');
        $this->db->join('marital_status', 'marital_status.id = customers.id_marital_status');
        $this->db->group_by('customers.id');
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $this->db->like('firstname', $_GET['search']);
            $this->db->or_like('lastname', $_GET['search']);
        }
        $limit = 5;
        if (isset($_GET['per_page'])) {
            $first = ($_GET['per_page'] - 1) * 5;
        } else {
            $first = 0;
        }
        $this->db->limit($limit, $first);
        $query = $this->db->get('customers');
        return $query->result();
    }

        //cette methode compte le nombre de clients
        public function countAll() {
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $this->db->like('firstname', $_GET['search']);
                $this->db->or_like('lastname', $_GET['search']);
                $this->db->from('customers');
                return $this->db->count_all_results();
            }
            return $this->db->count_all('customers');
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
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'street' => $this->input->post('street'),
                'complement' => $this->input->post('complement'),
                'phone' => $this->input->post('phone'),
                'mail' => $this->input->post('mail'),
                'birthdate' => $this->input->post('birthdate'),
                'date_register' => $this->input->post('date_register'),
                'id_marital_status' => $this->input->post('id_marital_status'),
                'id_cities' => $this->input->post('id_cities'),
            );
            $this->db->where('id', $id);
            $data = $this->security->xss_clean($data);
            return $this->db->update('customers', $data);
        }
}
