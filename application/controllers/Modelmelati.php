<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelmelati extends CI_Controller {

	public function index()
	{
		$data['melati']=$this->dataanggota_model->data_melati();
		$this->load->view('modelmelati/header');
		$this->load->view('modelmawar/sidebar');
		$this->load->view('modelmelati/modelmelati',$data);
		$this->load->view('modelmelati/footer');
	}

}

/* End of file Modelmawar.php */
/* Location: ./application/controllers/Modelmawar.php */