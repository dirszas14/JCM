<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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



public function ubahpassword()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/headermain');
		$this->load->view('admin/asidebar');
		$this->load->view('admin/ubahpassword');
		$this->load->view('admin/footer');		
	}

}



/* End of file Home.php */
/* Location: ./application/controllers/Home.php */