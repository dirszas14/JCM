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
          Alat
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
          <h3 class="box-title">Daftar Alat</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
           <?php if ($_SESSION['level'] =='Administrasi' ): ?>
        <div class="row">
          <div class="col-sm-2 pull-right">
            <a href="tambahalat.php" class="btn btn-primary">Tambah Alat</a>
          </div>
        </div>
        <?php endif ?>
        <br>
         <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="contoh" width="100%">
          <thead>
          <tr>
            <th>NO</th>
            <th>NO. SERI</th>
            <th>NAMA ALAT</th>
            <th>TANGGAL BELI</th>
            <th>WAKTU PEMELIHARAAN</th>
            <th>TIPE</th>
            <th>MEREK</th>
            <th>KODE LOKASI</th>
            <th>LOKASI</th>
            <th>Lantai</th>
            <th>OPSI</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            $sql = "SELECT alat.no_seri, alat.nm_alat, alat.tgl_beli, alat.w_pemeliharaan, alat.tipe, alat.merek, lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai 
            FROM alat INNER JOIN lokasi_alat ON alat.kd_lokalat = lokasi_alat.kd_lokalat";
            $query = mysqli_query($koneksi,$sql);
            $no =1;
            ?>

             <?php while ($data = mysqli_fetch_assoc($query)): ?>
               <tr>
                 <td><?php echo $no++?></td>
                  <td><?php echo $data['no_seri']; ?></td>
                  <td><?php echo $data['nm_alat']; ?></td>
                  <td><?php echo $data['tgl_beli']; ?></td>
                  <td><?php echo $data['w_pemeliharaan']; ?></td>
                  <td><?php echo $data['tipe']; ?></td>
                  <td><?php echo $data['merek']; ?></td>
                  <td><?php echo $data['kd_lokalat']; ?></td>
                  <td><?php echo $data['nm_lokasi']; ?></td>
                  <td><?php echo $data['lantai']; ?></td>
                  <td> <?php if ($_SESSION['level'] =='Administrasi' ): ?>
                    <a method="POST" href="editalat.php?no_seri=<?php echo $data['no_seri']; ?>" class="btn btn-warning">Ubah</a>
                    <input type="hidden" name="no_seri" value="<?php echo $data['no_seri']; ?>">
                  <a method="POST" href="hapusalat.php?no_seri=<?php echo $data['no_seri']; ?>" class="btn btn-danger">Hapus</a>
                  <input type="hidden" name="no_seri" value="<?php echo $data['no_seri']; ?>">
                  <?php endif ?>
                  </td>                 
              </tr>
             <?php endwhile; ?>
          </tbody>
        </table>
      </div>

        </div>
      </div>

      </div>
    </section>
</div>
</div>



<?php require_once '../template/footer.php'; ?>
