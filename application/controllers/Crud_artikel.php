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

    	$id_user = $this->session->userdata('id');
		$judul = $this->input->post('judul');
		$id_kategori = $this->input->post('kategori');
		$isiartikel_pre = $this->input->post('isiartikel');
    	$isiartikel = $isiartikel_pre;
		
		$config = [
				'upload_path' => './assets/img/',
				'allowed_types' => 'gif|jpg|png',
				'max_size' => 5000,
				'max_width' => 3000,
				'max_height' => 3000
			];
			$this->load->library('upload', $config);
			$this->upload->overwrite = true;
			$this->upload->do_upload('cover');
			$cover = $this->upload->data();
			
		$data = array(
     	 'id_user' => $id_user,
      	 'id_kategori' => $id_kategori,
		 'judul_artikel' => $judul,
		 'isi_artikel' => $isiartikel,
		 'cover_foto' => $cover['file_name']
			);
		$this->dataartikel_model->input_data($data,'artikel');
		$this->session->set_flashdata('info', 'true');
		redirect('Admin/artikel');
	}

	public function hapus_artikel($id_artikel){
		  $this->dataartikel_model->hapus_dataartikel($id_artikel);
		  redirect('Admin/artikel');
 	}

 	public function hapus_kategori($id_kategori){
		  $this->dataartikel_model->hapus_datakategori($id_kategori);
		  redirect('Admin/kategoriartikel');
 	}

 	public function tambah_kategori(){
		  $kategori = $this->input->post('kategori');

			$data = array(
	     	'kategori' => $kategori
				);
			$this->dataartikel_model->tambah_datakategori($data,'kategori');
			$this->session->set_flashdata('info', 'true');
			redirect('Admin/kategoriartikel');
 	}

 	public function editview($id_artikel)
	{
		$data['category'] = $this->dataartikel_model->selectcategory();
		$data['artikel'] = $this->dataartikel_model->editartikel($id_artikel);
		$data['namauser'] = $this->datauser_model->nama_user();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain',$data);
		$this->load->view('admin/asidebar',$data);
		$this->load->view('admin/editartikel',$data);
		$this->load->view('admin/footer');
	}

	public function viewartikel($id_artikel)
	{
		$data['category'] = $this->dataartikel_model->selectcategory();
		$data['recentpost'] = $this->dataartikel_model->recentpost();
		$data['viewartikel'] = $this->dataartikel_model->viewartikel($id_artikel);
		$this->load->view('blog/header');
		$this->load->view('blog/contohartikel',$data);
		$this->load->view('blog/footer');
	}

}
