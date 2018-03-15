<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarMember extends CI_Controller {

	public function index()
	{
		$this->load->view('daftar/header');
		$this->load->view('daftar/registrasi');
		$this->load->view('daftar/footer');
	}

}

/* End of file Modelmawar.php */