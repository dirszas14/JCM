<!-- header file header.php -->
<?php require_once '../template/header.php'; ?>
<!-- file connection koneksi.php -->
<?php require_once '../../function/koneksi.php'; ?>
<?php
$kd_jadwal=$_GET['kd_jadwal'];
$sql = "SELECT jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, jadwal.status, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai 
            FROM jadwal
            INNER JOIN alat ON jadwal.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON jadwal.kd_lokalat = lokasi_alat.kd_lokalat
            WHERE kd_jadwal='$kd_jadwal'";
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_assoc($query);
?>
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
          <h3 class="box-title">Konfirmasi Validasi</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>

        <!-- box body -->
        <div class="box-body">
          
          <form class="form-horizontal" action="../../function/jadwal-model.php" method='post'>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Jadwal</label>
              <div class="col-sm-10">
                <input type="text" name="kd_jadwal" class="form-control" required="true" value="<?php echo $kd_jadwal?>" readonly>
              </div>
            </div>
            <div class="col-sm-1 pull-right">
              <input type="hidden" name="kd_jadwal" value="<?php echo $kd_jadwal?>">
              <button type="submit" class="btn btn-primary" name="validasijadwal">Validasi</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>
<!-- <div class="modal fade" id="modal-hapus" role="dialog">
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
          <a href="../../function/user-model.php?hapususer=true&iduser=<?=$result['id_user']?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div> -->


<?php require_once '../template/footer.php'; ?>
 <script>
  
  $('input[name=tgl_beli').datepicker({ format: 'dd-m-yyyy' });
  </script>