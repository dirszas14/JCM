<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginPortalMember extends CI_Controller {

function __construct() {
parent::__construct();
if ($this->session->userdata('email')) {
redirect(base_url('PortalMember'));
}
$this->load->model(array('Login_Member'));
}

	public function index()
	{
		$this->load->view('PortalMember/Login');
		
	}

	public function proses() {
    $this->form_validation->set_rules('email', 'email', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('PortalMember/Login');
    } else {
      $email = $this->input->post('email');
      $psw1 = $this->input->post('password');
      $email = $email;
      $psw = md5($psw1);
      $cek = $this->Login_Member->cek($email, $psw);
      if ($cek->num_rows() > 0) {
        //login berhasil, buat session
        foreach ($cek->result() as $qad) {
          $sess_data['email'] = $qad->email;
          $sess_data['nama'] = $qad->nama;
          $sess_data['id'] = $qad->id;
          $sess_data['grade'] = $qad->grade;
          $this->session->set_userdata($sess_data);
        }
        $this->session->set_flashdata('success', 'Login Berhasil !');
        redirect('PortalMember');
      } else {
        $this->session->set_flashdata('result_login', '<br>ID User atau Password yang anda masukkan salah.');
        redirect('LoginPortalMember');
      }
    }
  }
}
/* End of file Home.php */
/* Location: ./application/controllers/Home.php */