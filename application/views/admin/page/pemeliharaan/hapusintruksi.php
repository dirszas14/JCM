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
        <?php if(isset($_GET['info'])) {?>
        <div class="alert alert-danger alert-dismissable">
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
          <h3 class="box-title">Hapus Perintah Pemeliharaan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <?php
$kd_pemeliharaan=$_GET['kd_pemeliharaan'];
$sql = "SELECT pemeliharaan.kd_pemeliharaan, pemeliharaan.status, user.nip, user.nama,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai 
            FROM pemeliharaan
            INNER JOIN user ON pemeliharaan.nip = user.nip
            INNER JOIN jadwal ON pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat 
            WHERE pemeliharaan.kd_pemeliharaan = '$kd_pemeliharaan'"; 
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_assoc($query);
?>
          <form class="form-horizontal" action="../../function/pemeliharaan-model.php" method='post'>
            <div class="form-group">
              <label for="varchar" class="col-sm-2 control-label">Kode Pemeliharaan</label>
              <div class="col-sm-6">
                <input type="text" name="kd_pemeliharaan" class="form-control" required="true" value="<?php echo $data['kd_pemeliharaan']?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Pelaksana</label>
              <div class="col-sm-6">
                <input type="text" name="pelaksana" id="pelaksana" class="form-control" required="true" value="<?php echo $data['nama']?>" readonly>
              </div>
                <div class="col-sm-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalPelaksana"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Kode Jadwal</label>
              <div class="col-sm-6">
                <input type="text" name="kd_jadwal" id="kd_jadwal" class="form-control" required="true" value="<?php echo $data['kd_jadwal']?>" readonly>
              </div>
               <div class="col-sm-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalJadwal"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">No Seri</label>
              <div class="col-sm-6">
                <input type="text" name="no_seri" id="no_seri" class="form-control" required="true" value="<?php echo $data['no_seri']?>" readonly>
              </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Nama Alat</label>
              <div class="col-sm-6">
                <input type="text" name="nm_alat" id="nm_alat" class="form-control" required="true" value="<?php echo $data['nm_alat']?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Lokasi</label>
              <div class="col-sm-6">
                <input type="text" name="kd_lokalat" id="kd_lokalat" class="form-control" required="true" value="<?php echo $data['kd_lokalat']?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Lokasi</label>
              <div class="col-sm-6">
                <input type="text" name="nm_lokasi" id="nm_lokasi" class="form-control" required="true" value="<?php echo $data['nm_lokasi']?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Lantai</label>
              <div class="col-sm-6">
                <input type="text" name="lantai" id="lantai" class="form-control" required="true" value="<?php echo $data['lantai']?>" readonly>
              </div>
            </div>
              <div class="form-group">
             
              <div class="col-sm-6">
                <input type="hidden" name="nip" id="nip" class="form-control" required="true" readonly>
              </div>
            </div>
            
            <div class="col-sm-1 pull-right">
              <button type="submit" class="btn btn-primary" name="hapusintruksi">Hapus</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>

<div class="modal fade" id="ModalPelaksana" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Teknisi</h4>
      </div>

      <div class="modal-body">
        <table id="lookuppelaksana" class="table table-bordered table-hover table-stripped">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Level</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql = "SELECT * FROM user WHERE level='Teknisi'";
            $query = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
            ?>

            <?php while ($data = mysqli_fetch_assoc($query)): ?>
            <tr class="pilihpelaksana" datanama="<?php echo $data['nama']; ?>" data_nip="<?php echo $data['nip']; ?>" >
              <td><?php echo $data['nip']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['level']; ?></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalJadwal" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 800px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Jadwal</h4>
      </div>

      <div class="modal-body">
        <div class="box-body table-responsive no-padding">
        <table id="lookupjadwal" class="table table-bordered table-hover table-stripped">
          <thead>
            <tr>
              <th>Kode Jadwal</th>
              <th>Tanggal Pemeliharaan</th>
              <th>No Seri</th>
              <th>Nama ALat</th>
              <th>Tipe</th>
              <th>Merek</th>
              <th>Kode Lokasi</th>
              <th>Nama Lokasi</th>
              <th>Lantai</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql="SELECT jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, jadwal.status, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai
            from jadwal INNER JOIN alat ON jadwal.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON jadwal.kd_lokalat = lokasi_alat.kd_lokalat 
            WHERE jadwal.status='Tervalidasi'";
            $query = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
            ?>

            <?php while ($data = mysqli_fetch_assoc($query)): ?>
            <tr class="pilihjadwal" datakd_jadwal="<?php echo $data['kd_jadwal']; ?>" datano_seri="<?php echo $data['no_seri']; ?>" datanm_alat="<?php echo $data['nm_alat']; ?>" datakd_lokalat="<?php echo $data['kd_lokalat']; ?>" datalokasi="<?php echo $data['nm_lokasi']; ?>" datalantai="<?php echo $data['lantai']; ?>">
              <td><?php echo $data['kd_jadwal']; ?></td>
              <td><?php echo $data['tgl_pemeliharaan']; ?></td>
              <td><?php echo $data['no_seri']; ?></td>
              <td><?php echo $data['nm_alat']; ?></td>
              <td><?php echo $data['tipe']; ?></td>
              <td><?php echo $data['merek']; ?></td>
              <td><?php echo $data['kd_lokalat']; ?></td>
              <td><?php echo $data['nm_lokasi']; ?></td>
              <td><?php echo $data['lantai']; ?></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php require_once '../template/footer.php'; ?>
 <!--<script>
  
  $('input[name=tgl_pemeliharaan').datepicker({ format: 'dd-m-yyyy' });
  </script>-->