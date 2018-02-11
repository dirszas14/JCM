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
          <h3 class="box-title">Hapus Jadwal</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>

        <!-- box body -->
        <div class="box-body">
          <?php
          $kd_jadwal=$_GET['kd_jadwal'];
           $sql = "SELECT jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, jadwal.status, alat.no_seri, alat.nm_alat, alat.tgl_beli, alat.w_pemeliharaan, alat.tipe, alat.merek, lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai 
            FROM jadwal
            INNER JOIN alat ON jadwal.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON jadwal.kd_lokalat = lokasi_alat.kd_lokalat WHERE kd_jadwal='$kd_jadwal' ";

          $query = mysqli_query($koneksi,$sql);
          $data = mysqli_fetch_assoc($query);
          ?>
          <form class="form-horizontal" action="../../function/jadwal-model.php" method='post'>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Jadwal</label>
              <div class="col-sm-10">
                <input type="text" name="kd_jadwal" class="form-control" required="true" value="<?php echo $kd_jadwal?>"readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Pemeliharaan</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_pemeliharaan" class="form-control" required="true" value="<?php echo $data['tgl_pemeliharaan']; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">No Seri</label>
              <div class="col-sm-6">
                <input type="text" name="no_seri" id="no_seri" class="form-control" required="true" value="<?php echo $data['no_seri']; ?>"readonly>
              </div>
               <div class="col-sm-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAlat">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Alat</label>
              <div class="col-sm-10">
                <input type="text" name="nm_alat" id="nm_alat" class="form-control" required="true" value="<?php echo $data['nm_alat']; ?>"readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Beli</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_beli" id="tgl_beli" class="form-control" required="true" value="<?php echo $data['tgl_beli']; ?>"readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Waktu Pemeliharaan</label>
              <div class="col-sm-10">
                <input type="text" name="w_pemeliharaan" id="w_pemeliharaan" class="form-control" required="true" value="<?php echo $data['w_pemeliharaan']; ?>"readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tipe</label>
              <div class="col-sm-10">
                <input type="text" name="tipe" id="tipe" class="form-control" required="true" value="<?php echo $data['tipe']; ?>"readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Merk</label>
              <div class="col-sm-10">
                <input type="text" name="merek" id="merek" class="form-control" required="true" value="<?php echo $data['merek']; ?>"readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Lokasi</label>
              <div class="col-sm-6">
                <input type="text" name="kd_lokalat" id="kd_lokalat" class="form-control" required="true" value="<?php echo $data['kd_lokalat']; ?>"readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Lokasi</label>
              <div class="col-sm-6">
                <input type="text" name="nm_lokasi" id="nm_lokasi" class="form-control" required="true" value="<?php echo $data['nm_lokasi']; ?>"readonly>
              </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Lantai</label>
              <div class="col-sm-6">
                <input type="text" name="lantai" id="lantai" class="form-control" required="true" value="<?php echo $data['lantai']; ?>"readonly>
              </div>
            </div>
            <div class="col-sm-2 pull-right">
              <button type="submit" class="btn btn-primary" name="hapusjadwal">HAPUS</button>
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
          <a href="../../function/jadwal-model.php?hapusjadwal=true&iduser=<?=$result['id_user']?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>


<?php require_once '../template/footer.php'; ?>
