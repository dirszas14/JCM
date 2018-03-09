<?php 
 
 
class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('DataUser_Model');
		$this->load->model('DataAnggota_Model');
		$this->load->helper('url');
 
	}
 
	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('anggota',$data);
	}

	function tambahuser_proses(){
		$prefix = 123 ;
		$id_temp = $this->input->post('nama');
		$id_nospace = str_replace(' ','',$id_temp);
		$id_lower = strtolower($id_nospace);
		$id_user = $id_lower.''.$prefix;
		$nama = $this->input->post('nama');
		$no_telp = $this->input->post('no_telp');
		$password = $this->input->post('no_telp');
		$level = $this->input->post('level');
 
		$data = array(
			'id_user' => $id_user,
			'nama' => $nama,
			'password' => md5($no_telp),
			'no_telp' => $no_telp,
			'level' => $level
			);
		$this->DataUser_Model->input_data($data,'user');
		redirect('Admin/anggota');
	}

	function tambahanggota_proses(){
		$unik = $this->DataAnggota_Model->id_anggota(); //
		$prefix = $unik;
		$nama = $this->input->post('nama');
		$usia = $this->input->post('usia');
		$no_telp = $this->input->post('no_telp');
		$domisili = $this->input->post('domisili');
		$tmp_lahir = $this->input->post('tmp_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tinggi = $this->input->post('tinggibadan');
		$berat = $this->input->post('beratbadan');
		$status = $this->input->post('status');
		$pengalaman = $this->input->post('pengalaman');
		$grade = $this->input->post('grade');
		$insentif = $this->input->post('insentif');
		$id_anggota = $grade.''.$prefix;
 
		$data = array(
			'id_anggota' => $id_anggota,
			'nama' => $nama,
			'usia' => $usia,
			'no_telp' => $no_telp,
			'kota_domisili' => $domisili,
			'tempat_lahir' => $tmp_lahir,
			'tgl_lahir' => $tgl_lahir,
			'tinggi_badan' => $tinggi,
			'berat_badan' => $berat,
			'status' => $status,
			'pengalaman' => $pengalaman,
			'grade' => $grade,
			'insentif' => $insentif
			);
		$this->DataAnggota_Model->input_data($data,'anggota');
		redirect('Admin/anggota');
	}
 
}