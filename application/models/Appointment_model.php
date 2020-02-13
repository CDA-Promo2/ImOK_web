<?php
class Appointment_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function getAppointments() {
        $this->db->select(['appointments.*', 'date_start', 'note', 'appointment_types.description as description', 'customers.firstname as firstnameCustomers', 'customers.lastname as lastnameCustomers', 'employees.lastname as lastnameEmployees', 'employees.firstname as firstnameEmployees', 'employees.mail as mailEmployees', 'customers.mail as mailCustomers', 'employees.phone as phoneEmployees', 'customers.phone as phoneCustomers', 'customers.street as streetCustomers', 'cities.name as citiesCustomers', 'cities.zip_code as codeCustomers']);
        $this->db->join('appointment_types', 'appointment_types.id = appointments.id_appointment_types');
        $this->db->join('customers', 'customers.id = appointments.id_customers');
        $this->db->join('cities', 'cities.id = customers.id_cities');
        $this->db->join('employees', 'employees.id = appointments.id_employees');
        if (isset($_GET['employee']) && !empty($_GET['employee'])) {
            $this->db->like('employees.firstname', $_GET['employee']);
        }
        $limit = 5;
        if (isset($_GET['per_page'])) {
            $first = ($_GET['per_page'] - 1) * 5;
        } else {
            $first = 0;
        }
        $this->db->limit($limit, $first);
        $query = $this->db->get('appointments');
        return $query->result();
    }

    public function createAppointments() {
        $data = [
            'date_start' => $this->input->post('date_start'),
            'note' => $this->input->post('note'),
            'id_appointment_types' => $this->input->post('id_appointment_types'),
            'id_customers' => $this->input->post('id_customers'),
            'id_employees' => $this->input->post('id_employees')
        ];
        $data = $this->security->xss_clean($data);
        return $this->db->insert('appointments', $data);
    }

    public function updateAppointments($id) {
        $data = array(
            'date_start' => $this->input->post('date_start'),
            'note' => $this->input->post('note'),
            'id_appointment_types' => $this->input->post('id_appointment_types'),
            'id_customers' => $this->input->post('id_customers'),
            'id_employees' => $this->input->post('id_employees'),
        );
        $this->db->where('id', $id);
        $data = $this->security->xss_clean($data);
        return $this->db->update('appointments', $data);
    }

            //cette methode compte le nombre de clients
            public function countAll() {
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $this->db->from('appointments');
                    return $this->db->count_all_results();
                }
                return $this->db->count_all('appointments');
            }

            // Méthode pour récupérer les info d'un client
            public function getAppointmentById($id) {
                $this->db->select(['appointments.*', 'date_start']);
                $this->db->join('appointment_types', 'appointments.id_appointment_types = appointment_types.id');
                $this->db->join('customers', 'appointments.id_customers = customers.id');
                $this->db->join('employees', 'appointments.id_employees = employees.id');
                $this->db->where('appointments.id', $id);
                $query = $this->db->get('appointments');
                return $query->row();
            }

            // Méthode pour récupérer les info d'un client
            public function getAppointmentByIdCustomers($id) {
                $this->db->select(['appointments.*', 'appointments.date_start', 'employees.firstname as firstname', 'employees.lastname as lastname']);
                $this->db->join('customers', 'appointments.id_customers = customers.id');
                $this->db->join('employees', 'appointments.id_employees = employees.id');
                $this->db->where('customers.id', $id);
                $query = $this->db->get('appointments');
                return $query->result();
            }

            public function deleteAppointment($id) {
                $this->db->where('id', $id);
                return $this->db->delete('appointments');
            }

}