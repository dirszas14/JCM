<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['artikel_home'] = $this->dataartikel_model->artikel_home();
		$data['member_content'] = $this->dataanggota_model->member_content();
		$data['member_content_mel'] = $this->dataanggota_model->member_content_mel();
		$this->load->view('home/header');
		$this->load->view('home/content',$data);
		$this->load->view('home/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */