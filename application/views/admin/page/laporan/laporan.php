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
          Laporan
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
    <div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
        <h4 class="box-title">Pilih Tanggal</h4>
          <div class="row">
            <form action="laporan.php" method="get" class="form-tanggal">
              <div class="form-group">
                <label class="col-sm-1 control-label">Dimulai Tanggal</label>
                <div class="col-sm-2">
                 <?php  if (isset($_GET['tanggalmulai'])) { ?>
                  <input type="text" name="tanggalmulai" class="form-control" 
                  value="<?= $_GET['tanggalmulai'] ?>">
                 <?php } else {?>
                  <input type="text" name="tanggalmulai" class="form-control" placeholder="Tanggal Mulai">
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-1 control-label">Sampai Tanggal</label>
                <div class="col-sm-2">
                 <?php  if (isset($_GET['tanggalselesai'])) { ?>
                  <input type="text" name="tanggalselesai" class="form-control" 
                  value="<?= $_GET['tanggalselesai'] ?>">
                 <?php } else {?>
                  <input type="text" name="tanggalselesai" class="form-control" placeholder="Tanggal Selesai">
                  <?php } ?>
                </div>
              </div>
              <div class="col-sm-2">
                <input type="submit" value="GO" class="btn btn-primary">
              </div>
            </form>
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
                <th>KODE HASIL</th>
                <th>JENIS PEMELIHARAAN</th>
                <th>Tanggal Pemeliharaan</th>
                <th>NAMA ALAT</th>
                <th>TIPE</th>
                <th>MEREK</th>
                <th>LOKASI</th>
                <th>LANTAI</th>
                <th>PELAKSANA</th>
                <th>KETERANGAN</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $tanggalmulai ="";
            $tanggalselesai ="";
            if ( isset($_GET['tanggalmulai']) && isset($_GET['tanggalselesai']) ) {
              $tanggalmulai = date('Y-m-d',strtotime($_GET['tanggalmulai'])) ;
              $tanggalselesai = date('Y-m-d',strtotime($_GET['tanggalselesai']));
            }  
             $sql = "SELECT hsl_pemeliharaan.kd_hasil, hsl_pemeliharaan.j_pemeliharaan, hsl_pemeliharaan.keterangan,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai, pemeliharaan.kd_pemeliharaan, user.nip, user.nama
            FROM hsl_pemeliharaan
            INNER JOIN user ON hsl_pemeliharaan.nip = user.nip
            INNER JOIN jadwal ON hsl_pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON hsl_pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON hsl_pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            INNER JOIN pemeliharaan ON hsl_pemeliharaan.kd_pemeliharaan = pemeliharaan.kd_pemeliharaan 
            WHERE date(tgl_pemeliharaan)=CURDATE() AND keterangan='Tervalidasi'"; 
            $query = mysqli_query($koneksi,$sql);
            $no =1;
            ?>

            <?php while ($data = mysqli_fetch_assoc($query)): ?>
              <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $data['kd_hasil']; ?></td>
              <td><?php echo $data['j_pemeliharaan']; ?></td>
              <td><?php echo $data['tgl_pemeliharaan']; ?></td>
              <td><?php echo $data['nm_alat']; ?></td>
              <td><?php echo $data['tipe']; ?></td>
              <td><?php echo $data['merek']; ?></td>
              <td><?php echo $data['nm_lokasi']; ?></td>
              <td><?php echo $data['lantai']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['keterangan']; ?></td>
              <!--<td><a href="detailreport.php?idbook=<?=$result['id_book']?>" class="btn btn-sm btn-primary" >Detail <i class="fa fa-edit"></i></a></td>-->
              </tr>
            <?php endwhile; ?>
            </tbody>
          </table>
          <div class="row">
           <?php if ( isset($_GET['tanggalmulai']) && isset($_GET['tanggalselesai']) ): ?>
              <form action="report.php" method="post">
                <input type="hidden" name="tanggalmulai" value="<?=$tanggalmulai?>">
                <input type="hidden" name="tanggalselesai" value="<?=$tanggalselesai?>">
                &nbsp;&nbsp;&nbsp;
                <button type="submit"  class="btn btn-primary"> Download</button><br>
              </form>
           <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<?php require_once '../template/footer.php'; ?>

<script>

$('.table-data').DataTable();
$('input[name=tanggalmulai]').datepicker({ format: 'dd M yyyy' });
$('input[name=tanggalselesai]').datepicker({ format: 'dd M yyyy' });
</script>