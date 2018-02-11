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
          <h3 class="box-title">Perijinan Pemeliharaan</h3>
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
            <a href="intruksi.php" class="btn btn-primary">Intruksi</a>
          </div>
        </div>
        <?php endif ?>
        <br>
         <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="contoh" width="100%">
          <thead>
          <tr>
            <th>NO.</th>
                <th>KODE PEMELIHARAAN</th>
                <th>PELAKSANA</th>
                <th>KODE JADWAL</th>
                <th>Tanggal Pemeliharaan</th>
                <th>NO SERI</th>
                <th>NAMA ALAT</th>
                <th>TIPE</th>
                <th>MEREK</th>
                <th>KODE LOKASI</th>
                <th>NAMA LOKASI</th>
                <th>Lantai</th>
                <th>OPSI</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            $bagian = $_SESSION['bagian'];
            $status = 'Diambil';
            $sql = "SELECT pemeliharaan.kd_pemeliharaan, pemeliharaan.status, user.nip, user.nama,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai 
            FROM pemeliharaan
            INNER JOIN jadwal ON pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON pemeliharaan.no_seri = alat.no_seri
            INNER JOIN user ON pemeliharaan.nip = user.nip
            INNER JOIN lokasi_alat ON pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            WHERE lokasi_alat.nm_lokasi = '$bagian' AND pemeliharaan.status='$status'"; 
            $query = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
            $no =1;
            ?>

             <?php while ($data = mysqli_fetch_assoc($query)): ?>
              <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $data['kd_pemeliharaan']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['kd_jadwal']; ?></td>
              <td><?php echo $data['tgl_pemeliharaan']; ?></td>
              <td><?php echo $data['no_seri']; ?></td>
              <td><?php echo $data['nm_alat']; ?></td>
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

                  <?php if ($_SESSION['level'] =='Supervisor' ): ?>
                    <a method="POST" href="konfirmasiperijinan.php?kd_pemeliharaan=<?php echo $data['kd_pemeliharaan']; ?>" class="btn btn-primary">Izinkan</a>
                    <input type="hidden" name="kd_pemeliharaan" value="<?php echo $data['kd_pemeliharaan']; ?>">
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
