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
          User
        </h1>
        <?php if(isset($_GET['info'])) :?>
            <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= $_GET['info'] ?>
            </div>  
        <?php endif; ?>
      </section>
      
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Hapus User</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>

        <!-- box body -->
        <div class="box-body">
          <?php
          $kd_hasil=$_GET['kd_hasil'];
          $sql = "SELECT hsl_pemeliharaan.kd_hasil, hsl_pemeliharaan.j_pemeliharaan, hsl_pemeliharaan.keterangan,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai, pemeliharaan.kd_pemeliharaan, user.nip, user.nama
            FROM hsl_pemeliharaan
            INNER JOIN user ON hsl_pemeliharaan.nip = user.nip
            INNER JOIN jadwal ON hsl_pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON hsl_pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON hsl_pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            INNER JOIN pemeliharaan ON hsl_pemeliharaan.kd_pemeliharaan = pemeliharaan.kd_pemeliharaan 
            WHERE hsl_pemeliharaan.kd_hasil = '$kd_hasil'"; 
          $query = mysqli_query($koneksi,$sql);
          $data = mysqli_fetch_assoc($query);
          ?>
          <form class="form-horizontal" action="../../function/hasil-model.php" method='post'>
            <div class="form-group">
              <label for="varchar" class="col-sm-2 control-label">Kode Hasil</label>
              <div class="col-sm-6">
                <input type="text" name="kd_hasil" class="form-control" required="true" value="<?php echo $data['kd_hasil']?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" readonly>Jenis Pemeliharaan</label>
                <div class="col-sm-10">
                <input type="text" name="j_pemeliharaan" class="form-control" required="true" value="<?php echo $data['j_pemeliharaan']; ?>" readonly >
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Kode Pemeliharaan</label>
              <div class="col-sm-6">
                <input type="text" name="kd_pemeliharaan" id="kd_pemeliharaan" class="form-control" required="true" value="<?php echo $data['kd_pemeliharaan']?>" readonly>
              </div>
               <div class="col-sm-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalPemeliharaan">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Pelaksana</label>
              <div class="col-sm-6">
                <input type="text" name="nama" id="nama" class="form-control" required="true" value="<?php echo $data['nama']?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Jadwal</label>
              <div class="col-sm-6">
                <input type="text" name="kd_jadwal" id="kd_jadwal" class="form-control" required="true" value="<?php echo $data['kd_jadwal']?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Pemeliharaan</label>
              <div class="col-sm-6">
                <input type="text" name="tgl-pemeliharaan" id="tgl_pemeliharaan" class="form-control" required="true" value="<?php echo $data['tgl_pemeliharaan']?>" readonly>
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
                <input type="hidden" name="nip" id="nip" class="form-control" required="true" value="<?php echo $data['nip']?>" readonly >
              </div>
            </div>
            <div class="col-sm-2 pull-right">
              <button type="submit" class="btn btn-primary" name="hapushasil">HAPUS</button>
            </div>          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>
<div class="modal fade" id="modal-hapus" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus</h4>
      </div>

      <div class="modal-body">
        <strong>Anda yakin ingin menghapus data?</strong><br>
        <small>Data yang terhapus tidak dapat dikembalikan</small>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a href="../../function/hasil-model.php?hapushasil=true&iduser=<?=$result['id_user']?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>


<?php require_once '../template/footer.php'; ?>
