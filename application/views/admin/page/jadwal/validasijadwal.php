<!-- header file header.php -->
<?php require_once '../template/header.php'; ?>
<!-- file connection koneksi.php -->
<?php require_once '../../function/koneksi.php'; ?>

<div class="wrapper">
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- headermain or (navbar) -->
    <?php require_once '../template/headermain.php' ?>
    <!-- sidebar (asidebar.php) -->
    <?php require_once '../template/asidebar.php' ?> 


    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Jadwal
        </h1>
        <br>
        <?php if(isset($_GET['info'])) {?>
        <div class="alert alert-success alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?= $_GET['info'] ?>
        </div>
        <?php } ?>
      </section>
      
      <!-- Main content -->
        <section class="content">
      <!-- Default box -->
      <div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Validasi Jadwal</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <?php if ($_SESSION['level'] =='Kepala Unit' ): ?> 
        <div class="row">
          <div class="col-sm-2 pull-right">
            <a href="penjadwalan.php" class="btn btn-primary">Tambah Jadwal</a>
          </div>
        </div>
        <?php endif ?> 
        <br>
          <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="contoh" width="100%">
          <thead>
              <tr>
                <th>NO.</th>
                <th>KODE JADWAL</th>
                <th>TANGGAL PEMELIHARAAN</th>
                <th>NO SERI</th>
                <th>Nama ALAT</th>
                <th>Tipe</th>
                <th>Merk</th>
                <th>KODE Lokasi</th>
                <th>NAMA Lokasi</th>
                <th>LANTAI</th>
                <th>Status</th>
                <?php if ($_SESSION['level'] =='Kepala Instalasi' ): ?>
                <th>OPSI</th>
                   <?php endif ?>
              </tr>
            </thead>
            <tbody>
               <?php 
            $sql = "SELECT jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, jadwal.status, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai 
            FROM jadwal
            INNER JOIN alat ON jadwal.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON jadwal.kd_lokalat = lokasi_alat.kd_lokalat"; 
            $query = mysqli_query($koneksi,$sql);
            $no =1;
            ?>

             <?php while ($data = mysqli_fetch_assoc($query)): ?>
              
              <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $data['kd_jadwal']; ?></td>
              <td><?php echo $data['tgl_pemeliharaan']; ?></td>
              <td><?php echo $data['no_seri']; ?></td>
              <td><?php echo $data['nm_alat']; ?></td>
              <td><?php echo $data['tipe']; ?></td>
              <td><?php echo $data['merek']; ?></td>
              <td><?php echo $data['kd_lokalat']; ?></td>
              <td><?php echo $data['nm_lokasi']; ?></td>
              <td><?php echo $data['lantai']; ?></td>
              <td><?php echo $data['status']; ?></td>
              <?php if ($_SESSION['level'] =='Kepala Instalasi' ): ?>
               <td> 
                    <a method="POST" href="konfirmasivalidasijadwal.php?kd_jadwal=<?php echo $data['kd_jadwal']; ?>" class="btn btn-primary">Validasi</a>
                    <input type="hidden" name="kd_jadwal" value="<?php echo $data['kd_jadwal']; ?>">
                 
                  </td>
                   <?php endif ?>                 
              </tr> 
              <?php endwhile; ?>
                 
            </tbody>
        </table>
         </div>
        
</div>
      </div>
    </section>
  </div>
</div>



<?php require_once '../template/footer.php'; ?>
