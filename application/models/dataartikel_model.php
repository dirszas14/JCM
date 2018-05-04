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
      $sql = "SELECT artikel.id_artikel, artikel.judul_artikel, kategori.kategori, user.nama, artikel.tanggal 
      		  FROM artikel 
      		  INNER JOIN kategori on artikel.id_kategori = kategori.id_kategori
      		  INNER JOIN user on artikel.id_user = user.id
      		  ORDER BY artikel.judul_artikel";
			  $query = $this->db->query($sql);
			  return $query->result();
    }

    public function tampilkategori(){
    	$this->db->select('*');
    	$this->db->from('kategori');
    	$query = $this->db->get();
    	return $query->result();
    }

    public function editartikel($id_artikel)
    {
        $this->db->select('*');
		$this->db->from('artikel');
		$this->db->where('id_artikel',$id_artikel);
		$query = $this->db->get();
		return $query->row_array();
    }

    public function totalartikel()
    {
      $this->db->select('*');
		$this->db->from('artikel');
		$query = $this->db->get();
		return $query->num_rows();
    }

    public function artikel_home()
    {
    	$sql = "SELECT artikel.*, user.nama as 'nama_user'
    			FROM artikel 
				INNER JOIN user ON artikel.id_user = user.id
    			ORDER BY artikel.id_artikel DESC LIMIT 3";
    	$query = $this->db->query($sql);
    	return $query->result();
    }

     public function viewartikel($id_artikel)
    {
    	$sql = "SELECT artikel.*, user.nama as 'nama_user'
    			FROM artikel 
				INNER JOIN user ON artikel.id_user = user.id
				WHERE artikel.id_artikel = $id_artikel";
    	$query = $this->db->query($sql);
    	return $query->row_array();
    }

    public function recentpost()
    {
    	$sql = "SELECT artikel.*, user.nama as 'nama_user'
    			FROM artikel 
				INNER JOIN user ON artikel.id_user = user.id
    			ORDER BY artikel.id_artikel DESC LIMIT 5";
    	$query = $this->db->query($sql);
    	return $query->result();
    }

     public function selectcategory()
    {
    	$sql = "SELECT * FROM kategori ORDER BY kategori ASC";
    	$query = $this->db->query($sql);
    	return $query->result();
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

 	public function hapus_datakategori($id_kategori){
	  $this->db->where('id_kategori',$id_kategori);
	  return $this->db->delete('kategori');
 	}

 	public function tambah_datakategori($data,$table){
	  $this->db->insert($table,$data);
 	}


}
