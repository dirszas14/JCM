<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

function __construct() {
parent::__construct();
if ($this->session->userdata('id_user')) {
redirect(base_url('Admin'));
}
$this->load->model(array('Login_Model'));
}

	public function index()
	{
		$this->load->view('login/login');
		
	}

	public function proses() {
    $this->form_validation->set_rules('id_user', 'id_user', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login/login');
    } else {
      $usr = $this->input->post('id_user');
      $psw = $this->input->post('password');
      $u = $usr;
      $p = md5($psw);
      $cek = $this->Login_Model->cek($u, $p);
      if ($cek->num_rows() > 0) {
        //login berhasil, buat session
        foreach ($cek->result() as $qad) {
          $sess_data['id_user'] = $qad->id_user;
          $sess_data['nama'] = $qad->nama;
          $sess_data['level'] = $qad->level;
          $this->session->set_userdata($sess_data);
        }
        $this->session->set_flashdata('success', 'Login Berhasil !');
        redirect('Admin');
      } else {
        $this->session->set_flashdata('result_login', '<br>ID User atau Password yang anda masukkan salah.');
        redirect('Login');
      }
    }
  }
}
/* End of file Home.php */
/* Location: ./application/controllers/Home.php */