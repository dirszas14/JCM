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
          <h3 class="box-title">Tambah Lokasi</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <form class="form-horizontal" action="../../function/lokasi-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Lokasi</label>
              <div class="col-sm-10">
                <input type="text" name="kd_lokalat" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Lokasi</label>
              <div class="col-sm-10">
                <select name="nm_lokasi" class="form-control" id="">
                  <option value="">Pilih Lokasi</option>
                  <option value="ICU">ICU</option>
                  <option value="HCU">HCU</option>
                  <option value="UGD">UGD</option>
                  <option value="OKA">OKA</option>
                  <option value="Melati">Melati</option>
                  <option value="Mawar">Mawar</option>
                  <option value="Anggrek">Anggrek</option>
                  <option value="Radiologi">Radiologi</option>
                  <option value="Radiodiagnostik">Radiodiagnostik</option>
                </select>
              </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Lantai</label>
              <div class="col-sm-10">
                <input type="text" name="lantai" class="form-control" required="true">
              </div>
            </div>
            
            <div class="col-sm-1 pull-right">
              <button type="submit" class="btn btn-primary" name="tambahlokasi">Simpan</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>

<!--<?php require_once '../template/footer.php'; ?>
 <script>
  
  $('input[name=tgl_beli]').datepicker({ format: 'dd-m-yyyy' });
  </script>-->