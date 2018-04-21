<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class Email extends CI_Controller {
  public function verifikasi()
  {
   $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'talent.jcmanagement@gmail.com',
    'smtp_pass' => 'jcmanagement2018',
    'mailtype' => 'html',
    'charset' => 'iso-8859-1'
   );
   $this->load->library('email', $config);
   $this->email->set_newline("\r\n");
   $this->email->from('talent.jcmanagement@gmail.com', 'Admin JCM');
   $this->email->to('kismawati@gmail.com');
   $this->email->subject('Percobaan email');
   $this->email->message('Percobaan kirim email menggunakan Library Email Code Igniter 3 @Alief-Panda-Super');
   if (!$this->email->send()) {
    show_error($this->email->print_debugger());
   }else{
    $this->redirect('Admin/user');
   }
  }
 }
