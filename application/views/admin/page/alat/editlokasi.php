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
          <h3 class="box-title">Ubah Alat</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>

        <!-- box body -->
        <div class="box-body">
          <?php
          $kd_lokalat=$_GET['kd_lokalat'];
          $sql = "SELECT lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai FROM lokasi_alat WHERE kd_lokalat='$kd_lokalat'";
          $query = mysqli_query($koneksi,$sql);
          $data = mysqli_fetch_assoc($query);
          ?>
          <form class="form-horizontal" action="../../function/lokasi-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Lokasi</label>
              <div class="col-sm-10">
                <input type="text" name="kd_lokalat" class="form-control" required="true" value="<?php echo $kd_lokalat?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Lokasi</label>
              <div class="col-sm-10">
                <select name="nm_lokasi" class="form-control" id="">
                  <option value="">Pilih Lokasi</option>
                  <option value="ICU" <?php if($data['nm_lokasi']=="ICU") echo 'selected="selected"'; ?>>ICU</option>
                  <option value="HCU" <?php if($data['nm_lokasi']=="HCU") echo 'selected="selected"'; ?>>HCU</option>
                  <option value="IGD" <?php if($data['nm_lokasi']=="IGD") echo 'selected="selected"'; ?>>IGD</option>
                  <option value="OKA" <?php if($data['nm_lokasi']=="OKA") echo 'selected="selected"'; ?>>OKA</option>
                  <option value="MELATI" <?php if($data['nm_lokasi']=="Melati") echo 'selected="selected"'; ?>>Melati</option>
                  <option value="MAWAR" <?php if($data['nm_lokasi']=="Mawar") echo 'selected="selected"'; ?>>Mawar</option>
                  <option value="ANGGREK" <?php if($data['nm_lokasi']=="Anggrek") echo 'selected="selected"'; ?>>Anggrek</option>
                  <option value="Radiologi" <?php if($data['nm_lokasi']=="Radiologi") echo 'selected="selected"'; ?>>Radiologi</option>
                  <option value="Radiodiagnostik" <?php if($data['nm_lokasi']=="Radiodiagnostik") echo 'selected="selected"'; ?>>Radiodiagnostik</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Lantai</label>
              <div class="col-sm-10">
                <input type="text" name="lantai" class="form-control" required="true" value="<?php echo $data['lantai']; ?>" >
              </div>
            </div>
            <div class="col-sm-2 pull-right">
              <input type="hidden" name="kd_lokasilama" value="<?php echo $kd_lokalat?>">
              <button type="submit" class="btn btn-primary" name="editlokasi">UPDATE</button>
            </div>
            <div class="col-sm-4 pull-left">
          
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
          <a href="../../function/user-model.php?hapususer=true&iduser=<?=$result['id_user']?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade" id="ModalLokasi" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
</div> -->

<?php require_once '../template/footer.php'; ?>
 <script>
  
  $('input[name=tgl_beli]').datepicker({ format: 'dd-m-yyyy' });
  </script>
