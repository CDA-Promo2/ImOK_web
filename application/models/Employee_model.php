<?php


class Employee_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function getById($id){
		$query=$this->db->get_where('employees',array('id'=>$id));
		return $query->row();
	}

	public function getRole($id){
		$query=$this->db->get_where('roles',array('id'=>$id));
		return $query->row();
	}
}
