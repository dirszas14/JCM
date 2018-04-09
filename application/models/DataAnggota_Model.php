<?php
class dataanggota_model extends CI_Model{
	public function __construct()
{
parent::__construct();
$this->load->database();
}
	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	public function regis_data($data,$table){
		$this->db->insert($table,$data);
	}
	public function tampilanggota()
{
$sql = "SELECT * FROM anggota WHERE approval IS TRUE";
			$query = $this->db->query($sql);
			return $query->result();
}
public function anggotaterbaru()
{
$sql = "SELECT * FROM anggota WHERE approval IS TRUE ORDER BY tanggal_gabung DESC Limit 8";
			$query = $this->db->query($sql);
			return $query->result();
}
public function totalanggotaterbaru()
{
$sql = "SELECT * FROM anggota WHERE approval IS TRUE ORDER BY tanggal_gabung DESC Limit 8";
			$query = $this->db->query($sql);
		return $query->num_rows();
}
		public function approveanggota($where,$data,$table){
			$this->db->where($where);
		$this->db->update($table,$data);
	}
public function totalmawar()
{
$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('grade','Mawar');
		$this->db->where('approval',TRUE);
		$query = $this->db->get();
		return $query->num_rows();
}
public function totalmelati()
{
$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('grade','Melati');
		$this->db->where('approval',TRUE);
		$query = $this->db->get();
		return $query->num_rows();
}
public function totalapproval()
{
$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('approval',FALSE);
		$query = $this->db->get();
		return $query->num_rows();
}
		public function approve()
	{
			$this->db->select('*');
	$this->db->from('anggota');
	$this->db->where('approval',FALSE);
	$query = $this->db->get();
	return $query->result();
	}

	public function id_anggota_mawar()   {
		$this->db->select('RIGHT(anggota.id_anggota,4) as kode', FALSE);
		$this->db->where('grade','Mawar');
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
	public function id_anggota_melati()   {
		$this->db->select('RIGHT(anggota.id_anggota,4) as kode', FALSE);
		$this->db->where('grade','Melati');
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
	public function hapus_dataanggota($id)
		{
			$this->db->where('id',$id);
			return $this->db->delete('anggota');
		}

	public	function data_mawar()
		{
			$this->db->select("*");
			$this->db->where('grade','Mawar');
			$this->db->from('anggota');
			$query = $this->db->get();
			return $query->result_array();
		}

	public	function data_melati()
		{
			$this->db->select("*");
			$this->db->where('grade','Melati');
			$this->db->from('anggota');
			$query = $this->db->get();
			return $query->result_array();
		}


	public function jumlah_data_mawar()
		{
			$this->db->where('grade','Mawar');
			return $this->db->get('anggota')->num_rows();
		}

	public function approvedetail($id)
		{
			$this->db->select('*');
			$this->db->from('anggota');
			$this->db->where('id',$id);
			$query = $this->db->get();
			return $query->row_array();
		}

	public function detailanggota($id)
		{
			$this->db->select('*');
			$this->db->from('anggota');
			$this->db->where('id',$id);
			$query = $this->db->get();
			return $query->row_array();
		}

}