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
		$id_user =  $this->input->post('email');
		$nama = $this->input->post('nama');
		$no_telp = $this->input->post('no_telp');
		$level = $this->input->post('level');

		$data = array(
			'id_user' => $id_user,
			'nama' => $nama,
			'password' => md5($no_telp),
			'no_telp' => $no_telp,
			'level' => $level
			);
		$this->datauser_model->input_data($data,'user');
		redirect('Admin/user');
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

  public function profile_user($id){
  		  $query = $this->datauser_model->profileuser($id);
  		  $data['id_user'] = $query['id_user'];
  		  $data['nama'] = $query['nama'];
  		  $data['level'] = $query['level'];
  		  $data['no_telp'] = $query['no_telp'];
		  $data['foto'] = $query['foto'];
		  $data['namauser'] = $this->datauser_model->nama_user();
  		  $this->load->view('admin/header');
		  $this->load->view('admin/headermain',$data);
		  $this->load->view('admin/asidebar',$data);
		  $this->load->view('admin/profileuser',$data);
		  $this->load->view('admin/footer');
   	}

public function detail_user($id){
  		  $query = $this->datauser_model->profileuser($id);
  		  $data['id_user'] = $query['id_user'];
  		  $data['nama'] = $query['nama'];
  		  $data['level'] = $query['level'];
  		  $data['no_telp'] = $query['no_telp'];
		  $data['foto'] = $query['foto'];
		  $data['namauser'] = $this->datauser_model->nama_user();
  		  $this->load->view('admin/header');
		  $this->load->view('admin/headermain',$data);
		  $this->load->view('admin/asidebar',$data);
		  $this->load->view('admin/detailuser',$data);
		  $this->load->view('admin/footer');
   	}

public function reset_pw(){
	$no_telp = $this->input->post('no_telp');
	$id_user = $this->input->post('id_user');
	$data = array(
		'password' => md5($no_telp)
	);

	$where = array(
		'id_user' => $id_user
	);
  		 $this->datauser_model->reset_pw($where,$data,'user');
  		 redirect('Admin/user');
   }

public function update_profile(){
	$id_user = $this->input->post('id_user');
	$nama = $this->input->post('nama');
	$no_telp = $this->input->post('no_telp');

			$config = [
				 'upload_path' => './assets/img/',
				 'allowed_types' => 'gif|jpg|png',
				 'max_size' => 1000,
				 'max_width' => 1000,
				 'max_height' => 1000
			 ];

			 $this->load->library('upload', $config);
			 $this->upload->overwrite = true;
			 if (!$this->upload->do_upload('fotoprofile')) //jika gagal upload
			 {
					 $error = array('error' => $this->upload->display_errors()); //tampilkan error
					 $this->load->view('Admin/errorupload', $error);
			 } else
			 //jika berhasil upload
			 {
				 $gbr = $this->upload->data();

	$data = array(
		'nama' => $nama,
		'no_telp' => $no_telp,
		'foto' => $gbr['file_name']
	);

	$where = array(
		'id_user' => $id_user
	);

	$this->datauser_model->update_profile($where,$data,'user');
	redirect('Admin');
}
}

}
