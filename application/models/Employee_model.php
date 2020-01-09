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
		$query=$this->db->select(['employees.*','roles.name as role'])
						->join('roles','roles.id = employees.id_roles')
						->get_where('employees',array('employees.id'=>$id));
		return $query->row();
	}

	public function create($random_password){
		$data = [
			'lastname' => $this->input->post('lastname'),
			'firstname' =>$this->input->post('firstname'),
			'street' =>$this->input->post('street'),
			'complement' =>$this->input->post('complement'),
			'id_cities' =>$this->input->post('id_cities'),
			'mail' =>$this->input->post('mail'),
			'phone' =>$this->input->post('phone'),
			'id_roles' => $this->input->post('id_roles'),
			'password' => $random_password
		];
		$data = $this->security->xss_clean($data);
		return $this->db->insert('employees',$data);
	}

	public function update($id){
		$data = [
			'lastname' => $this->input->post('lastname'),
			'firstname' =>$this->input->post('firstname'),
			'street' =>$this->input->post('street'),
			'complement' =>$this->input->post('complement'),
			'id_cities' =>$this->input->post('id_cities'),
			'mail' =>$this->input->post('mail'),
			'phone' =>$this->input->post('phone'),
			'id_roles' => $this->input->post('id_roles')
		];
		$data = $this->security->xss_clean($data);
		return $this->db->where('id',$id)->update('employees',$data);
	}

	public function getRole($id){
		$query=$this->db->get_where('roles',array('id'=>$id));
		return $query->row();
	}
}
