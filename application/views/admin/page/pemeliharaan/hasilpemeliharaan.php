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
          Pemeliharaan
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
          <h3 class="box-title">Hasil Pemeliharaan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
           <?php if ($_SESSION['level'] =='Teknisi' ): ?>
        <div class="row">
          <div class="col-sm-2 pull-right">
            <a href="entryhasil.php" class="btn btn-primary">Entry Hasil</a>
          </div>
        </div>
        <?php endif ?>
        <br>
         <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="contoh" width="100%">
          <thead>
          <tr>
            <th>NO.</th>
                <th>KODE HASIL</th>
                <th>JENIS PEMELIHARAAN</th>
                <th>KODE JADWAL</th>
                <th>Tanggal Pemeliharaan</th>
                <th>NO SERI</th>
                <th>NAMA ALAT</th>
                <th>TIPE</th>
                <th>MEREK</th>
                <th>KODE LOKASI</th>
                <th>LOKASI</th>
                <th>LANTAI</th>
                <th>KODE PEMELIHARAAN</th>
                <th>PELAKSANA</th>
                <th>KETERANGAN</th>
                <th>OPSI</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            
            $sql = "SELECT hsl_pemeliharaan.kd_hasil, hsl_pemeliharaan.j_pemeliharaan, hsl_pemeliharaan.keterangan,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai, pemeliharaan.kd_pemeliharaan, user.nip, user.nama
            FROM hsl_pemeliharaan
            INNER JOIN user ON hsl_pemeliharaan.nip = user.nip
            INNER JOIN jadwal ON hsl_pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON hsl_pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON hsl_pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            INNER JOIN pemeliharaan ON hsl_pemeliharaan.kd_pemeliharaan = pemeliharaan.kd_pemeliharaan 
            "; 
            
            $query = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
            $no =1;
            ?>

             <?php while ($data = mysqli_fetch_assoc($query)): ?>
              <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $data['kd_hasil']; ?></td>
              <td><?php echo $data['j_pemeliharaan']; ?></td>
              <td><?php echo $data['kd_jadwal']; ?></td>
              <td><?php echo $data['tgl_pemeliharaan']; ?></td>
              <td><?php echo $data['no_seri']; ?></td>
              <td><?php echo $data['nm_alat']; ?></td>
              <td><?php echo $data['tipe']; ?></td>
              <td><?php echo $data['merek']; ?></td>
              <td><?php echo $data['kd_lokalat']; ?></td>
              <td><?php echo $data['nm_lokasi']; ?></td>
              <td><?php echo $data['lantai']; ?></td>
              <td><?php echo $data['kd_pemeliharaan']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['keterangan']; ?></td>
                  <td> <?php if ($_SESSION['level'] =='Teknisi' ): ?>
                    <a method="POST" href="edithasil.php?kd_hasil=<?php echo $data['kd_hasil']; ?>" class="btn btn-warning">Ubah</a>
                    <input type="hidden" name="kd_hasil" value="<?php echo $data['kd_hasil']; ?>">
                  <a method="POST" href="hapushasil.php?kd_hasil=<?php echo $data['kd_hasil']; ?>" class="btn btn-danger">Hapus</a>
                  <input type="hidden" name="kd_hasil" value="<?php echo $data['kd_hasil']; ?>">
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
