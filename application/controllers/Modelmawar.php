<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelmawar extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->model('dataanggota_model');
		}

	public function index()
	{
		$this->load->database();
		$jumlah_data_mawar = $this->dataanggota_model->jumlah_data_mawar();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/modelmawar';
		$config['total_rows'] = $jumlah_data_mawar;
		$config['per_page'] = 12;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['mawar'] = $this->dataanggota_model->data_mawar($config['per_page'],$from);
		$this->load->view('modelmawar/header');
		$this->load->view('modelmawar/sidebar');
		$this->load->view('modelmawar/modelmawar',$data);
		$this->load->view('modelmawar/footer');
	}

}

/* End of file Modelmawar.php */
