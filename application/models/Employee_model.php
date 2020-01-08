<?php


class Employee_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function getAll(){
		$query=$this->db->select(['employees.id','employees.firstname','employees.lastname','roles.name as role'])
						->join('roles','roles.id = employees.id_roles')
						->get('employees');
		return $query->result();
	}

	public function getById($id){
		$query=$this->db->select(['employees.*','roles.name','cities.name'])
						->join('roles','roles.id = employees.id_roles')
						->join('cities','cities.id = employees.id_cities')
						->get_where('employees',array('employees.id'=>$id));
		return $query->row();
	}

	public function getRole($id){
		$query=$this->db->get_where('roles',array('id'=>$id));
		return $query->row();
	}
}
