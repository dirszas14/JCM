<?php


class Crud_user extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('datauser_model');
		$this->load->helper('url');
	}

	public function index(){

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
		$this->datauser_model->input_data($data,'user');
		redirect('Admin/anggota');
		$this->session->set_flashdata('Berhasil', 'true');
	}

 	public function ubahpassword(){
	$id_user = $this->input->post('id_user');
	$password = $this->input->post('password');

	$data = array(
		'password' => md5($password)
	);

	$where = array(
		'id_user' => $id_user
	);

	$this->datauser_model->ubahpassword($where,$data,'user');
	$this->session->set_flashdata('Berhasil', 'true');
	redirect('Admin/ubahpassword');
}

public function hapus_user($id_user){
		  $this->datauser_model->hapus_datauser($id_user);
		  redirect('Admin/user');
 	}

  public function profile_user($id_user){
  		  $this->datauser_model->profileuser($id_user);
  		  redirect('Admin/profileuser');
   	}

public function reset_pw($id_user){
  		 $this->datauser_model->hapus_datauser($id_user);
  		 redirect('Admin/anggota');
   }
}
