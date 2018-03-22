<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

 public function __construct() {
  parent::__construct();
  if (!isset($this->session->userdata['id_user'])) {
  redirect(base_url("Login"));
  }
 }

	public function index()
	{
		$data['totalmawar']= $this->dataanggota_model->totalmawar();
		$data['totalmelati']= $this->dataanggota_model->totalmelati();
		$data['totalartikel']= $this->dataartikel_model->totalartikel();
		$data['totaluser']= $this->datauser_model->totaluser();
		$data['totalapproval']= $this->dataanggota_model->totalapproval();
		$data['anggotaterbaru']= $this->dataanggota_model->anggotaterbaru();
		$data['totalanggotaterbaru']= $this->dataanggota_model->totalanggotaterbaru();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer');
	}

public function anggota()
	{
		$data['anggota'] = $this->dataanggota_model->tampilanggota();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/anggota',$data);
		$this->load->view('admin/footer');
	}

public function approve()
	{
    $data['approve'] = $this->dataanggota_model->approve();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/approve',$data);
		$this->load->view('admin/footer');
	}

public function user()
	{
		$data['user'] = $this->datauser_model->tampiluser();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/user',$data);
		$this->load->view('admin/footer');
	}

public function ubahpassword()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/ubahpassword');
		$this->load->view('admin/footer');
	}

public function artikel()
	{
    $data['artikel'] = $this->dataartikel_model->tampilartikel();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/artikel',$data);
		$this->load->view('admin/footer');
	}

 function logout(){
  $this->session->sess_destroy();
  redirect(base_url('Login'));
 }

}



/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
