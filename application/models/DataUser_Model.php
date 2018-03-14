<?php 
 
class DataUser_Model extends CI_Model{
	function input_data($data,$table){
		$this->db->insert($table,$data);		
	}

	 function tampiluser()
    {
        $query=$this->db->query("SELECT * FROM user ORDER BY id_user ASC");
        return $query->result();
    }

    function ubahpassword($where,$table){		
	return $this->db->get_where($table,$where);
}
}