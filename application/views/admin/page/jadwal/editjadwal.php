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
          <h3 class="box-title">Ubah Jadwal</h3>
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
                <input type="text" name="kd_jadwal" class="form-control" required="true" value="<?php echo $kd_jadwal?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Pemeliharaan</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_pemeliharaan" class="form-control" required="true" value="<?php echo $data['tgl_pemeliharaan']; ?>" >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">No Seri</label>
              <div class="col-sm-6">
                <input type="text" name="no_seri" id="no_seri" class="form-control" required="true" value="<?php echo $data['no_seri']; ?>">
              </div>
               <div class="col-sm-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAlat"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Alat</label>
              <div class="col-sm-10">
                <input type="text" name="nm_alat" id="nm_alat" class="form-control" required="true" value="<?php echo $data['nm_alat']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Beli</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_beli" id="tgl_beli" class="form-control" required="true" value="<?php echo $data['tgl_beli']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Waktu Pemeliharaan</label>
              <div class="col-sm-10">
                <input type="text" name="w_pemeliharaan" id="w_pemeliharaan" class="form-control" required="true" value="<?php echo $data['w_pemeliharaan']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tipe</label>
              <div class="col-sm-10">
                <input type="text" name="tipe" id="tipe" class="form-control" required="true" value="<?php echo $data['tipe']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Merk</label>
              <div class="col-sm-10">
                <input type="text" name="merek" id="merek" class="form-control" required="true" value="<?php echo $data['merek']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Lokasi</label>
              <div class="col-sm-6">
                <input type="text" name="kd_lokalat" id="kd_lokalat" class="form-control" required="true" value="<?php echo $data['kd_lokalat']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Lokasi</label>
              <div class="col-sm-6">
                <input type="text" name="nm_lokasi" id="nm_lokasi" class="form-control" required="true" value="<?php echo $data['nm_lokasi']; ?>">
              </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Lantai</label>
              <div class="col-sm-6">
                <input type="text" name="lantai" id="lantai" class="form-control" required="true" value="<?php echo $data['lantai']; ?>">
              </div>
            </div>
            <div class="col-sm-2 pull-right">
              <input type="hidden" name="kd_jadwallama" value="<?php echo $kd_jadwal?>">
              <button type="submit" class="btn btn-primary" name="editjadwal">UPDATE</button>
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

<div class="modal fade" id="ModalAlat" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 800px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Alat</h4>
      </div>

      <div class="modal-body">
        <div class="box-body table-responsive no-padding">
        <table id="lookupalat" class="table table-bordered table-hover table-stripped">
          <thead>
            <tr>
              <th>No Seri</th>
              <th>Nama ALat</th>
              <th>Tanggal Beli</th>
              <th>Waktu Pemeliharaan</th>
              <th>Tipe</th>
              <th>Merek</th>
              <th>Kode Lokasi</th>
              <th>Nama Lokasi</th>
              <th>Lantai</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql="SELECT alat.no_seri, alat.nm_alat, alat.tgl_beli, alat.w_pemeliharaan, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai
            from alat INNER JOIN lokasi_alat ON alat.kd_lokalat= lokasi_alat.kd_lokalat";

            $query = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
            ?>

            <?php while ($data = mysqli_fetch_assoc($query)): ?>
            <tr class="pilihalat" datano_seri="<?php echo $data['no_seri']; ?>" datanm_alat="<?php echo $data['nm_alat']; ?>"
              datatgl_beli="<?php echo $data['tgl_beli']; ?>" dataw_pemeliharaan="<?php echo $data['w_pemeliharaan']; ?>"
              datatipe="<?php echo $data['tipe']; ?>" datamerek="<?php echo $data['merek']; ?>" 
              datakd_lokalat="<?php echo $data['kd_lokalat']; ?>" datanm_lokasi="<?php echo $data['nm_lokasi']; ?>" 
              datalantai="<?php echo $data['lantai']; ?>">
              <td><?php echo $data['no_seri']; ?></td>
              <td><?php echo $data['nm_alat']; ?></td>
              <td><?php echo $data['tgl_beli']; ?></td>
              <td><?php echo $data['w_pemeliharaan']; ?></td>
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
 <script>
  
  $('input[name=tgl_pemeliharaan').datepicker({ format: 'dd-m-yyyy' });
  </script>