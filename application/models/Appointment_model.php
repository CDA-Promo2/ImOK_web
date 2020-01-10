<?php
class Appointment_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function getAppointments() {
        $this->db->select(['appointments.*', 'date_start', 'date_end', 'note', 'appointment_types.description as description', 'customers.firstname as firstnameCustomers', 'customers.lastname as lastnameCustomers', 'employees.lastname as lastnameEmployees', 'employees.firstname as firstnameEmployees', 'employees.mail', 'employees.phone']);
        $this->db->join('appointment_types', 'appointment_types.id = appointments.id_appointment_types');
        $this->db->join('customers', 'customers.id = appointments.id_customers');
        $this->db->join('employees', 'employees.id = appointments.id_employees');
        $query = $this->db->get('appointments');
        return $query->result();
    }

    public function createAppointments() {
        $data = [
            'date_start' => $this->input->post('date_start'),
            'date_end' => $this->input->post('date_end'),
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
            'date_end' => $this->input->post('date_end'),
            'note' => $this->input->post('note'),
            'id_appointment_types' => $this->input->post('id_appointment_types'),
            'id_customers' => $this->input->post('id_customers'),
            'id_employees' => $this->input->post('id_employees'),
        );
        $this->db->where('id', $id);
        $data = $this->security->xss_clean($data);
        return $this->db->update('appointments', $data);
    }

            // Méthode pour récupérer les info d'un client
            public function getAppointmentByIdCustomers($id) {
                $this->db->select(['appointments.*', 'customers.*']);
                $this->db->join('appointment_types', 'appointments.id_appointment_types = appointment_types.id');
                $this->db->join('customers', 'appointments.id_customers = customers.id');
                $this->db->join('employees', 'appointments.id_employees = employees.id');
                $this->db->where('customers.id', $id);
                $query = $this->db->get('appointments');
                return $query->row();
            }

}