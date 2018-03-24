<?php

class datauser_model extends CI_Model{
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	 public function tampiluser()
    {
       	$sql = "SELECT * FROM user ORDER BY id_user ASC";
		$query = $this->db->query($sql);
		return $query->result();
    }

    public function profileuser($id_user)
     {
       $this->db->select('*');
   		$this->db->from('user');
      $this->db->where('id_user',$id_user);
   		$query = $this->db->get();
 		return $query->result();
     }

    public function ubahpassword($where,$data,$table){
    	$this->db->where($where);
		return $this->db->update($table,$data);
	}

	public function hapus_datauser($id_user){
	 	$this->db->where('id_user',$id_user);
	  	return $this->db->delete('user');
 	}

 	public function totaluser(){
 		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->num_rows();
 	}
}
