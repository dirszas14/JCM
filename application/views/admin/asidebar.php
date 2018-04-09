<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=base_url()?>assets/img/<?=$namauser['foto'];?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
         <?php
                 $id_user=$this->session->userdata('id_user');
                 ?>
        <p><a href="<?php echo site_url("Crud_user/profile_user/$id_user")?>"> <?php echo $namauser['nama']; ?></a></p>
        <i class="fa fa-circle text-success"></i> Online
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header">NAVIGASI UTAMA</li>
      <li class="<?php if($this->uri->segment(2)==""){echo 'active';} ?>">
        <a href="<?php echo site_url('admin')?>">
          <i class="fa fa-dashboard"></i><span> Home</span>
        </a>
      </li>
    <li class="treeview <?php if($this->uri->segment(2)=="anggota"){ echo 'active anggota-active';}
          else if ($this->uri->segment(2)=="approve"){echo 'active approve-active';}?>">
            <a href="#">
              <i class="fa fa-user-o"></i>
              <span>Keanggotaan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if($this->uri->segment(2)=="anggota"){echo 'active anggota-active';} ?>"><a href="<?php echo site_url('admin/anggota') ?>"><i class="fa fa-user-o"></i> Anggota</a></li>
              <li class="<?php if($this->uri->segment(2)=="approve"){echo 'active approve-active';} ?>"><a href="<?php echo site_url('admin/approve') ?>"><i class="fa fa-check"></i> Approve</a></li>
            </ul>
          </li>
   <li class="<?php if($this->uri->segment(2)=="user"){echo 'active';} ?>">
      <a href="<?php echo site_url('admin/user')?>">
        <i class="fa fa-users"></i><span> Manajemen User</span>
      </a>
    </li>
   <!--  <li class="<?php if($this->uri->segment(2)=="approve"){echo 'active';} ?>">
      <a href="<?php echo site_url('admin/approve')?>">
        <i class="fa fa-check"></i><span> Approve</span>
      </a>
    </li>  -->
     <li class="<?php if($this->uri->segment(2)=="artikel"){echo 'active';} ?>">
      <a href="<?php echo site_url('admin/artikel')?>">
        <i class="fa fa-newspaper-o"></i><span> Artikel</span>
      </a>
    </li>
     <li class="<?php if($this->uri->segment(2)=="kategoriartikel"){echo 'active';} ?>">
      <a href="<?php echo site_url('admin/kategoriartikel')?>">
        <i class="fa fa-tags"></i><span> Kategori Artikel</span>
      </a>
    </li>
    <li class="<?php if($this->uri->segment(2)=="laporan"){echo 'active';} ?>">
      <a href="<?php echo site_url('admin/laporan')?>">
        <i class="fa fa-book"></i><span> Laporan</span>
      </a>
    </li>
    <li class="<?php if($this->uri->segment(2)=="ubahpassword"){echo 'active';} ?>">
      <a href="<?php echo site_url('admin/ubahpassword')?>">
        <i class="fa fa-key"></i><span> Ubah Password</span>
      </a>
    </li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>
<div class="wrapper">
  <body class="hold-transition skin-red sidebar-mini">
