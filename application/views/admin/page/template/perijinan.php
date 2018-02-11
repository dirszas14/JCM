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
          <h3 class="box-title">Perintah Pemeliharaan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <form class="form-horizontal" action="../../function/pemeliharaan-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">No. Intruksi</label>
              <div class="col-sm-10">
                <input type="text" name="no_seri" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">No. Seri</label>
              <div class="col-sm-10">
                <input type="text" name="nm_alat" class="form-control" required="true">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Nama Alat</label>
              <div class="col-sm-10">
                <textarea name="tipe" class="form-control"></textarea>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Tipe</label>
              <div class="col-sm-10">
                <textarea name="merek" class="form-control"></textarea>
              </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Merek</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_beli" class="form-control" required="true">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Pemeliharaan</label>
              <div class="col-sm-10">
                <textarea name="w_pemeliharaan" class="form-control"></textarea>
              </div>
            </div>
               <div class="form-group">
               <label class="col-sm-2 control-label">Pelaksana</label>
               <div class="col-sm-10">
                <textarea name="w_pemeliharaan" class="form-control"></textarea>
              </div>
            </div>
            
            <div class="col-sm-1 pull-right">
              <button type="submit" class="btn btn-primary" name="tambahalat">Simpan</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>

<?php require_once '../template/footer.php'; ?>
 <script>
  
  $('input[name=tgl_beli]').datepicker({ format: 'dd-m-yyyy' });
  </script>