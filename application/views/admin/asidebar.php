<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/dist/img/user.png')?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama'); ?></p>
        <i class="fa fa-circle text-success"></i> Online
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header">NAVIGASI UTAMA</li>
      <li class="<?php if($this->uri->segment(2)==""){echo 'active';} ?>">
        <a href="<?php echo site_url('admin')?>">
          <i class="fa fa-dashboard"></i><span>Home</span>
        </a>
      </li>
     <!--  <li class="treeview <?php if($this->uri->segment(2)=="waitingTA" OR $this->uri->segment(2)=="tolakemailta"){ echo 'active waiting-active';}
        else if($this->uri->segment(2)=="finishTA"){ echo 'active anggota-active';}
        else if ($this->uri->segment(2)=="prosesTA"){echo 'active approve-active';}?>">
        <a href="#"><i class= "fa fa-user"></i><span>Keanggotaan</span>
        <span class="pull-right-container">
          <i class = "fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class = "treeview-menu">
        <li class="<?php if($this->uri->segment(2)=="anggota"){echo 'active anggota-active';} ?>"><a href="<?php echo site_url('admin/anggota')?>"><i class="fa fa-user-plus"></i> <span>Anggota</span></a></li>
        <li class="<?php if($this->uri->segment(2)=="approve"){echo 'active approve-active';} ?>"><a href="<?php echo site_url('admin/approve')?>"><i class="fa fa-check"></i> <span>Approve</span></a></li>
      </ul>
    </li>     -->
    <li class="<?php if($this->uri->segment(2)=="anggota"){echo 'active';} ?>">
      <a href="<?php echo site_url('admin/anggota')?>">
        <i class="fa fa-user-plus"></i><span>Anggota</span>
      </a>
    </li>
    <li class="<?php if($this->uri->segment(2)=="approve"){echo 'active';} ?>">
      <a href="<?php echo site_url('admin/approve')?>">
        <i class="fa fa-check"></i><span>Approve</span>
      </a>
    </li>
    <li class="<?php if($this->uri->segment(2)=="ubahpassword"){echo 'active';} ?>">
      <a href="<?php echo site_url('admin/ubahpassword')?>">
        <i class="fa fa-key"></i><span>Ubah Password</span>
      </a>
    </li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>