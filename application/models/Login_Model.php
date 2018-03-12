<?php
  class Login_Model extends CI_Model {

      function cek($id_user, $password) {
        $this->db->where("id_user", $id_user);
        $this->db->where("password", $password);
        return $this->db->get("user");
      }

      function getLoginData($usr, $psw) {
        $u = $usr;
        $p = $psw;
        $q_cek_login = $this->db->get_where('user', array('id_user' => $u, 'password' => $p));
        if (count($q_cek_login->result()) > 0) {
          foreach ($q_cek_login->result() as $qck) {
            foreach ($q_cek_login->result() as $qad) {
              $sess_data['logged_in'] = TRUE;
              $sess_data['id_user'] = $qad->id_user;
              $sess_data['password'] = $qad->password;
              $sess_data['nama'] = $qad->nama;
              $this->session->set_userdata($sess_data);
            }
          redirect('Admin');
          }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'Admin');
          }
      }
  }
?>