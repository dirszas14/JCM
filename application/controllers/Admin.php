<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

 function __construct() {
  parent::__construct();
  if (!isset($this->session->userdata['id_user'])) {
  redirect(base_url("Login"));
  }
 }

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');		
	}

public function anggota()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/anggota');
		$this->load->view('admin/footer');		
	}

public function approve()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/approve');
		$this->load->view('admin/footer');		
	}

public function surat()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/surat');
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

 function logout(){
  $this->session->sess_destroy();
  redirect(base_url('Login'));
 }

}



/* End of file Home.php */
/* Location: ./application/controllers/Home.php */