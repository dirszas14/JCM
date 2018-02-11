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
          <h3 class="box-title">Tambah Alat</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <form class="form-horizontal" action="../../function/alat-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">No. Seri</label>
              <div class="col-sm-10">
                <input type="text" name="no_seri" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Alat</label>
              <div class="col-sm-10">
                <input type="text" name="nm_alat" class="form-control" required="true">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Tipe</label>
              <div class="col-sm-10">
                <textarea name="tipe" class="form-control"></textarea>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Merk</label>
              <div class="col-sm-10">
                <textarea name="merek" class="form-control"></textarea>
              </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Beli</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_beli" class="form-control" required="true">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Waktu Pemeliharaan</label>
              <div class="col-sm-10">
                <textarea name="w_pemeliharaan" class="form-control"></textarea>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Kode Lokasi</label>
              <div class="col-sm-6">
                <input type="text" name="kd_lokalat" id="kd_lokalat" class="form-control" required="true" readonly="">
              </div>
               <div class="col-sm-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalLokasi"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Lokasi</label>
              <div class="col-sm-6">
                <input type="text" name="nm_lokasi" id="nm_lokasi" class="form-control" required="true" readonly="">
              </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Lantai</label>
              <div class="col-sm-6">
                <input type="text" name="lantai" id="lantai" class="form-control" required="true" readonly="">
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

<div class="modal fade" id="ModalLokasi" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Lokasi</h4>
      </div>

      <div class="modal-body">
        <table id="lookuplokasi" class="table table-bordered table-hover table-stripped">
          <thead>
            <tr>
              <th>Kode Lokasi</th>
              <th>Nama Lokasi</th>
              <th>Lantai</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql = "SELECT * FROM lokasi_alat";
            $query = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
            ?>

            <?php while ($data = mysqli_fetch_assoc($query)): ?>
            <tr class="pilihlokasi" datakd_lokalat="<?php echo $data['kd_lokalat']; ?>" datanm_lokasi="<?php echo $data['nm_lokasi']; ?>" datalantai="<?php echo $data['lantai']; ?>">
              <td><?php echo $data['kd_lokalat']; ?></td>
              <td><?php echo $data['nm_lokasi']; ?></td>
              <td><?php echo $data['lantai']; ?></td>
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

    </div>
  </div>
</div>

<?php require_once '../template/footer.php'; ?>
 <script>
  
  $('input[name=tgl_beli]').datepicker({ format: 'dd-m-yyyy' });
  </script>