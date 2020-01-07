<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function validate($mail,$password){
		$query = $this->db->get_where('employees',array('mail' => $mail));
		$user = $query->row();
		if($user && password_verify($password,$user->password)){
			return $user;
		}
		return false;
	}
}

