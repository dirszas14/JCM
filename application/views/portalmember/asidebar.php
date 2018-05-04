<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=base_url()?>assets/img/<?=$dataanggota['foto_closeup'];?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
         <?php
                 $id=$this->session->userdata('id');
                 ?>
        <p><a href=""><?=$dataanggota['nama']; ?> </a></p>
        <i class="fa fa-circle text-success"></i> Online
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header">NAVIGASI UTAMA</li>
      <li class="<?php if($this->uri->segment(2)==""){echo 'active';} ?>">
        <a href="<?php echo site_url('portalmember')?>">
          <i class="fa fa-dashboard"></i><span> Home</span>
        </a>
      </li>
        <li class="<?php if($this->uri->segment(2)=="detailpribadi"){echo 'active';} ?>">
        <a href="<?php echo site_url('portalmember/detailpribadi')?>">
          <i class="fa fa-files-o"></i><span> Detail Pribadi</span>
        </a>
      </li>
       <li class="<?php if($this->uri->segment(2)=="fotosaya"){echo 'active';} ?>">
        <a href="<?php echo site_url('portalmember/fotosaya')?>">
          <i class="fa fa-picture-o "></i><span> Foto Saya</span>
        </a>
      </li>
   
  </ul>
</section>
<!-- /.sidebar -->
</aside>
<div class="wrapper">
  <body class="hold-transition skin-red sidebar-mini">
