
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="<?php echo base_url('assets/dist/img/user.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div> 

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">NAVIGASI UTAMA</li>
        <li>
          <a href="<?php echo site_url('admin')?>">
            <i class="fa fa-dashboard"></i><span>Home</span>
          </a>
        </li>
       
          <li>
            <a href="<?php echo site_url('admin/anggota')?>">
              <i class="fa fa-user"></i><span>Anggota</span>
            </a>
          </li>
           
         <li>
          <a href="#">
            <i class="fa fa-envelope"></i><span>Surat</span>
          </a>
        </li>
       

        <li>
          <a href="<?php echo site_url('admin/ubahpassword')?>">
            <i class="fa fa-key"></i><span>Ubah Password</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>