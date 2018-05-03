<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		$data['artikel'] = $this->dataartikel_model->editartikel();
		$this->load->view('blog/header');
		$this->load->view('blog/contohartikel',$data);
		$this->load->view('blog/footer');
	}
	
}

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */