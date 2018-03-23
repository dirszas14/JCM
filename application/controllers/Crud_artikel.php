<?php


class Crud_artikel extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('dataartikel_model');
		$this->load->helper('url');
	}

	function index(){
	}

	function tambahartikel_proses(){

    $id_user = $this->session->userdata('id_user');
		$judul = $this->input->post('judul');
		$tags = $this->input->post('tags');
		$isiartikel_pre = $this->input->post('isiartikel');
    $isiartikel = $isiartikel_pre;
		$date= date("Y-m-d");

		$data = array(
      'id_user' => $id_user,
      'tags' => $tags,
			'judul_artikel' => $judul,
			'isi_artikel' => $isiartikel,
			'tanggal' => $date
			);
		$this->dataartikel_model->input_data($data,'artikel');
		$this->session->set_flashdata('info', 'true');
		redirect('Admin/artikel');
	}

	public function hapus_artikel($id_artikel){
		  $this->dataartikel_model->hapus_dataartikel($id_artikel);
		  redirect('Admin/artikel');
 	}

}
