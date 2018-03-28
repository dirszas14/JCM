<?php
class Crud_anggota extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('dataanggota_model');
		$this->load->helper('url');
	}

	function index(){

	}

	function tambahanggota_proses(){
		$nama = $this->input->post('nama');
		$usia = $this->input->post('usia');
		$no_telp = $this->input->post('no_telp');
		$domisili = $this->input->post('domisili');
		$tmp_lahir = $this->input->post('tmp_lahir');
		$tgl_lahir = date('Y-m-d',strtotime($this->input->post('tgl_lahir')));
		$tinggi = $this->input->post('tinggibadan');
		$berat = $this->input->post('beratbadan');
		$status = $this->input->post('status');
		$pengalaman = $this->input->post('pengalaman');
		$grade = $this->input->post('grade');

		$unik="";
		if ($grade=="Mawar"){
			$unik = $this->dataanggota_model->id_anggota_mawar();

		}
		else if($grade=="Melati"){
			$unik = $this->dataanggota_model->id_anggota_melati();
		}

		$prefix = $unik;
		$prefixgrade = substr($grade,0,3);
		$insentif = $this->input->post('insentif');
		$id_anggota = $prefixgrade.'-'.$prefix;
		$tgl_gabung= date("Y-m-d");

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
			'insentif' => $insentif,
			'tanggal_gabung' => $tgl_gabung,
			'approval' => TRUE
			);
		$this->dataanggota_model->input_data($data,'anggota');
		$this->session->set_flashdata('info', 'true');
		redirect('Admin/anggota');
	}

	public function approve_anggota($id){
	$data = array(
		'approval' => TRUE
	);
	$where = array(
		'id' => $id
	);
	$this->dataanggota_model->approveanggota($where,$data,'anggota');
	redirect('Admin/approve');
}

	public function hapus_anggota($id){
		  $this->dataanggota_model->hapus_dataanggota($id);
		  redirect('Admin/anggota');
 	}

	public function tolak_anggota($id){
			$this->dataanggota_model->hapus_dataanggota($id);
			redirect('Admin/approve');
	}

	function regisanggota_proses(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$usia = $this->input->post('usia');
		$no_telp = $this->input->post('no_telp');
		$domisili = $this->input->post('domisili');
		$tmp_lahir = $this->input->post('tmp_lahir');
		$tgl_lahir = date('Y-m-d',strtotime($this->input->post('tgl_lahir')));
		$tinggi = $this->input->post('tinggibadan');
		$berat = $this->input->post('beratbadan');
		$status = $this->input->post('status');
		$pengalaman = $this->input->post('pengalaman');
		$insentif = $this->input->post('insentif');
		$tgl_gabung= date("Y-m-d");

		$data = array(
			'email' => $email,
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
			'insentif' => $insentif,
			'tanggal_gabung' => $tgl_gabung,
			'approval' => FALSE
			);
		$this->dataanggota_model->regis_data($data,'anggota');
		redirect('Daftarmember');
	}

	public function approve_detail($id){
			// $query = $this->datauser_model->profileuser($id_user);
			$data['detail'] = $this->dataanggota_model->approvedetail($id);
			$data['namauser'] = $this->datauser_model->nama_user();
			$this->load->view('admin/header');
			$this->load->view('admin/headermain',$data);
			$this->load->view('admin/asidebar',$data);
			$this->load->view('admin/approve_detail',$data);
			$this->load->view('admin/footer');
		}
}
