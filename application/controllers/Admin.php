<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/content');
		$this->load->view('home/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */