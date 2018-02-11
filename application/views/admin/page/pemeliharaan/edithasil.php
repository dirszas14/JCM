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
          Hasil Pemeliharaan
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
          <h3 class="box-title">Ubah Hasil Pemeliharaan</h3>
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
              <label class="col-sm-2 control-label">Jenis Pemeliharaan</label>
              <div class="col-sm-10">
                <select name="j_pemeliharaan" class="form-control" id="">
                  <option value="">Pilih Jenis Pemeliharaan</option>
                  <option value="Cleaning" <?php if($data['j_pemeliharaan']=="Cleaning") echo 'selected="selected"'; ?>>Cleaning</option>
                  <option value="Lubricating" <?php if($data['j_pemeliharaan']=="Lubricating") echo 'selected="selected"'; ?>>Lubricating</option>
                  <option value="Lightening" <?php if($data['j_pemeliharaan']=="Lightening") echo 'selected="selected"'; ?>>Lightening</option>
                  <option value="Replacement" <?php if($data['j_pemeliharaan']=="Replacement") echo 'selected="selected"'; ?>>Replacement</option>
                  <option value="Fungsional Check" <?php if($data['j_pemeliharaan']=="Fungsional Check") echo 'selected="selected"'; ?>>Fungsional Check</option>
                  <option value="Adjusment" <?php if($data['j_pemeliharaan']=="Adjusment") echo 'selected="selected"'; ?>>Adjusment</option>
                  <option value="Calibration" <?php if($data['j_pemeliharaan']=="Calibration") echo 'selected="selected"'; ?>>Calibration</option>
                </select>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Kode Pemeliharaan</label>
              <div class="col-sm-6">
                <input type="text" name="kd_pemeliharaan" id="kd_pemeliharaan" class="form-control" required="true" value="<?php echo $data['kd_pemeliharaan']?>" readonly>
              </div>
               <div class="col-sm-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalPemeliharaan"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
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
            
            <div class="col-sm-1 pull-right">
              <button type="submit" class="btn btn-primary" name="ubahhasil">Ubah</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>

<div class="modal fade" id="ModalPemeliharaan" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 800px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Pemeliharaan</h4>
      </div>

      <div class="modal-body">
        <div class="box-body table-responsive no-padding">
        <table id="lookup" class="table table-bordered table-hover table-stripped">
          <thead>
            <tr>
              <th>Kode Pemeliharaan</th>
              <th>NIP</th>
              <th>Pelaksana</th>
              <th>Kode Jadwal</th>
              <th>Tanggal Pemeliharaan</th>
              <th>No. Seri</th>
              <th>Nama Alat</th>
              <th>Tipe</th>
              <th>Merek</th>
              <th>Kode Lokasi</th>
              <th>Nama Lokasi</th>
              <th>Lantai</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $nip = $_SESSION['nip'];    
            $status = 'Diizinkan'   ;   
            $sql = "SELECT pemeliharaan.kd_pemeliharaan,pemeliharaan.status, user.nip,user.nama,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai 
            FROM pemeliharaan
            INNER JOIN jadwal ON pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN user ON pemeliharaan.nip = user.nip
            INNER JOIN alat ON pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            WHERE user.nip = '$nip' AND pemeliharaan.status='$status'";
            $query = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
            ?>

            <?php while ($data = mysqli_fetch_assoc($query)): ?>
            <tr class="pilihpemeliharaan" datakd_pemeliharaan="<?php echo $data['kd_pemeliharaan']; ?>" data_nip="<?php echo $data['nip']; ?>" data_pelaksana="<?php echo $data['nama']; ?>" datakd_jadwal="<?php echo $data['kd_jadwal']; ?>" datatgl_pemeliharaan="<?php echo $data['tgl_pemeliharaan']; ?>" datano_seri="<?php echo $data['no_seri']; ?>" datanm_alat="<?php echo $data['nm_alat']; ?>" data_tipe="<?php echo $data['tipe']; ?>" data_merek="<?php echo $data['merek']; ?>" datakd_lokalat="<?php echo $data['kd_lokalat']; ?>" datanm_lokasi="<?php echo $data['nm_lokasi']; ?>" data_lantai="<?php echo $data['lantai']; ?>" >
              <td><?php echo $data['kd_pemeliharaan']; ?></td>
              <td><?php echo $data['nip']; ?></td>
              <td><?php echo $data['nama']; ?></td>
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
 <script>
  
  $('input[name=tgl_beli]').datepicker({ format: 'dd-m-yyyy' });
  </script>