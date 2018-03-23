<?php

class dataartikel_model extends CI_Model{

	 public function __construct()
     {
           parent::__construct();
           $this->load->database();
     }

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function tampilartikel()
    {
      $sql = "SELECT * FROM artikel ORDER BY id_artikel DESC";
			$query = $this->db->query($sql);
			return $query->result();
    }

    public function totalartikel()
    {
      $this->db->select('*');
		$this->db->from('artikel');
		$query = $this->db->get();
		return $query->num_rows();
    }

 //     public function totalmelati()
 //    {
 //       $this->db->select('*');
	// 	$this->db->from('anggota');
	// 	$this->db->where('grade','Melati');
	// 	$query = $this->db->get();
	// 	return $query->num_rows();
 //    }

	// function id_anggota()   {
	// 	  $this->db->select('RIGHT(anggota.id_anggota,4) as kode', FALSE);
	// 	  $this->db->order_by('id_anggota','DESC');
	// 	  $this->db->limit(1);
	// 	  $query = $this->db->get('anggota');      //cek dulu apakah ada sudah ada kode di tabel.
	// 	  if($query->num_rows() <> 0){
	// 	   //jika kode ternyata sudah ada.
	// 	   $data = $query->row();
	// 	   $kode = intval($data->kode) + 1;
	// 	  }
	// 	  else {
	// 	   //jika kode belum ada
	// 	   $kode = 1;
	// 	  }
	// 	  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
	// 	  return $kodemax;
	// }

	public function hapus_dataartikel($id_artikel){
	  $this->db->where('id_artikel',$id_artikel);
	  return $this->db->delete('artikel');
 	}

}
