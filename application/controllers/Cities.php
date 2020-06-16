<?php
defined('BASEPATH') OR exist('No direct script access allowed');
class Cities extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['City_model']);
	}

	public function search()
	{
		$term = $this->input->get('term');
		$this->db->like('name', $term);
		$this->db->or_like('zip_code', $term);
		$this->db->limit(20);
		$this->db->order_by('name', 'ASC');
		$data = $this->db->get('cities')->result();
		echo json_encode($data);
	}
}
