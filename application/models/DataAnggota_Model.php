<?php

class DataAnggota_Model extends CI_Model{

	var $db;
	var $table = "anggota";

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}


	function id_anggota()   {
		  $this->db->select('RIGHT(anggota.id_anggota,4) as kode', FALSE);
		  $this->db->order_by('id_anggota','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('anggota');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  return $kodemax;  
	}

}