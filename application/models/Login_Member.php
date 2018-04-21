<?php
  class Login_Member extends CI_Model {

      function cek($email, $password) {
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        return $this->db->get("anggota");
      }

      function getLoginData($email, $psw) {
        $e = $email;
        $p = $psw;
        $q_cek_login = $this->db->get_where('member', array('email' => $e, 'password' => $p));
        if (count($q_cek_login->result()) > 0) {
          foreach ($q_cek_login->result() as $qck) {
            foreach ($q_cek_login->result() as $qad) {
              $sess_data['logged_in'] = TRUE;
              $sess_data['email'] = $qad->email;
              $sess_data['password'] = $qad->password;
              $sess_data['nama'] = $qad->nama;
              $this->session->set_userdata($sess_data);
            }
          redirect('Admin');
          }
        } else {
            $this->session->set_flashdata('result_login', '<br>Email atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'PortalMember');
          }
      }
  }
?>