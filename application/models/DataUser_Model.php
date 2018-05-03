<?php

class datauser_model extends CI_Model{
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	 public function tampiluser($id)
    {
       	$sql = "SELECT * FROM user WHERE id NOT IN ($id) ORDER BY id ASC";
		$query = $this->db->query($sql);
		return $query->result();
    }

    public function profileuser($id)
     {
       $this->db->select('*');
   		$this->db->from('user');
      $this->db->where('id',$id);
   		$query = $this->db->get();
 		return $query->row_array();
     }

    public function ubahpassword($where,$data,$table){
    	$this->db->where($where);
		return $this->db->update($table,$data);
	}

	public function hapus_datauser($id_user){
	 	$this->db->where('id',$id_user);
	  	return $this->db->delete('user');
 	}

 	public function totaluser(){
 		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->num_rows();
 	}

	public function update_profile($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function nama_user(){
		$idsession = $this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$idsession);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function reset_pw($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
