<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelmawar extends CI_Controller {

	public function index()
	{
		$this->load->view('modelmawar/header');
		$this->load->view('modelmawar/sidebar');
		$this->load->view('modelmawar/modelmawar');
		$this->load->view('modelmawar/footer');
	}

}

/* End of file Modelmawar.php */