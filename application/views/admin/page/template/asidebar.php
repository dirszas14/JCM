<?php
$nip=$_SESSION['nip'];
$sql= "SELECT * FROM user WHERE nip='$nip' ";
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_assoc($query);
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="../../function/gambaruser/<?=$data['foto'];?>" class="img-circle" alt="User Image" onerror="this.onerror=null;this.src='../../assets/dist/img/user.png';">
        </div>
        <div class="pull-left info">
          <a href="../user/lihatprofil.php"><p><?=$_SESSION['nama']; ?></p></a>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="../dashboard/dashboard.php">
            <i class="fa fa-dashboard"></i><span>Home</span>
          </a>
        </li>

        <?php if ($_SESSION['level'] =='Administrasi' ): ?> 
          <li>
            <a href="../user/user.php">
              <i class="fa fa-user-plus"></i><span>List User</span>
            </a>
          </li>
        <?php endif ?>     
        
        <?php if ($_SESSION['level'] =='Kepala Instalasi' or $_SESSION['level'] =='Kepala Unit' or $_SESSION['level'] == 'Administrasi' or $_SESSION['level'] == 'Teknisi'): ?>
          <li class="treeview">
          <a href="#"><i class= "fa fa-calendar"></i><span>Jadwal</span>
            <span class="pull-right-container">
              <i class = "fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class = "treeview-menu">
             <?php if ($_SESSION['level'] =='Kepala Instalasi' or $_SESSION['level'] =='Kepala Unit' or $_SESSION['level'] == 'Administrasi' or $_SESSION['level'] == 'Teknisi'): ?>       
            <li><a href="../jadwal/jadwal.php"><i class="fa fa-circle"></i> <span>Jadwal</span></a></li>
            <?php endif ?>
            <?php if ($_SESSION['level'] =='Kepala Instalasi' ): ?>
            <li><a href="../jadwal/validasijadwal.php"><i class="fa fa-edit"></i> <span>Validasi Jadwal</span></a></li>
            <?php endif ?>
            </ul>
          </li>
        <?php endif?>
        
       <?php if ($_SESSION['level'] =='Supervisor' or $_SESSION['level'] == 'Administrasi' or $_SESSION['level'] == 'Teknisi'): ?>
        <li class="treeview">
          <a href="#"><i class= "fa fa-wrench"></i><span>Pemeliharaan</span>
            <span class="pull-right-container">
              <i class = "fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class = "treeview-menu">
            <?php if ($_SESSION['level'] == 'Administrasi' or $_SESSION['level'] =='Teknisi' ): ?>
            <li><a href="../pemeliharaan/pemeliharaan.php"><i class="fa fa-circle"></i> <span>Pemeliharaan</span></a></li>
            <?php endif ?>
            <?php if ($_SESSION['level'] =='Supervisor' ): ?>
            <li><a href="../pemeliharaan/perijinan.php"><i class="fa fa-edit"></i> <span>Perizinan</span></a></li>
            <?php endif ?>
            <?php if ($_SESSION['level'] =='Teknisi' ): ?>
            <li><a href="../pemeliharaan/hasilpemeliharaan.php"><i class="fa fa-edit"></i> <span>Hasil Pemeliharaan</span></a></li>
            <?php endif ?>
            <?php if ($_SESSION['level'] =='Administrasi' ): ?>
            <li><a href="../pemeliharaan/validasihasil.php"><i class="fa fa-edit"></i> <span>Validasi Hasil</span></a></li>
            <?php endif ?>
            </ul>
          </li>
          <?php endif ?>

          <?php if ($_SESSION['level'] == 'Kepala Unit' or $_SESSION['level'] == 'Administrasi' or $_SESSION['level'] == 'Teknisi' ): ?>
        <li class="treeview">
          <a href="#"><i class= "fa fa-wrench"></i><span>Alat</span>
            <span class="pull-right-container">
              <i class = "fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class = "treeview-menu">
            <?php if ($_SESSION['level'] == 'Kepala Unit' or $_SESSION['level'] == 'Administrasi' or $_SESSION['level'] == 'Teknisi' ): ?>
            <li><a href="../alat/alat.php"><i class="fa fa-edit"></i> <span>Alat</span></a></li>
            <?php endif ?>
            <?php if ($_SESSION['level'] =='Administrasi' ): ?>
            <li><a href="../alat/lokasi.php"><i class="fa fa-circle"></i> <span>Lokasi</span></a></li>
            <?php endif ?>
            </ul>
          </li>
          <?php endif ?>

         <?php if ($_SESSION['level'] =='Kepala Instalasi' or $_SESSION['level'] == 'Kepala Unit' ): ?>
         <li>
          <a href="../laporan/laporan.php">
            <i class="fa fa-files-o"></i><span>Laporan</span>
          </a>
        </li>
        <?php endif ?>

        <li>
          <a href="../user/editpassword.php">
            <i class="fa fa-lock"></i><span>Ubah Password</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>