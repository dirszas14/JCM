<?php
class dataportalmember extends CI_Model{
public function __construct()
{
parent::__construct();
$this->load->database();
}

public function dataanggota()
	{
		$id=$this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

}