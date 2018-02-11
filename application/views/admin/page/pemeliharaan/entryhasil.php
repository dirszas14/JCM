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
          <h3 class="box-title">Entry Hasil Pemeliharaan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>


         <?php  
          $carikode = mysqli_query($koneksi, "select max(kd_hasil) from hsl_pemeliharaan") or die (mysql_error());
          // menjadikannya array
          $datakode = mysqli_fetch_array($carikode);
          // jika $datakode
          if ($datakode) {
           $nilaikode = substr($datakode[0], 10);
           
           // menjadikan $nilaikode ( int )
           $kode = (int) $nilaikode;
           // setiap $kode di tambah 1
           $kode = $kode + 1;
           $kode_otomatis = "H".str_pad($kode, 3, "0", STR_PAD_LEFT);
           $otomatis = $kode_otomatis;
          } else {
           $kode_otomatis = "H001";
           $otomatis = $date.$kode_otomatis;
          }

        ?>

        <!-- box body -->
        <div class="box-body">
          <form class="form-horizontal" action="../../function/hasil-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Hasil</label>
              <div class="col-sm-10">
                <input type="text" name="kd_hasil" value="<?php echo $otomatis;?>" readonly class="form-control" required="true">
              </div>
            </div>
           <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Pmeliharaan</label>
              <div class="col-sm-10">
                <select name="j_pemeliharaan" class="form-control" id="">
                  <option value="">Pilih Jenis Pemeliharaan</option>
                  <option value="Cleaning">Cleaning</option>
                  <option value="Lubricating">Lubricating</option>
                  <option value="Lightening">Tightening</option>
                  <option value="Replacement">Replacement</option>
                  <option value="Fungsional Check">Fungsional Check</option>
                  <option value="Adjusment">Adjusment</option>
                  <option value="Calibration">Calibration</option>
                </select>
              </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Kode Pemeliharaan</label>
              <div class="col-sm-6">
                <input type="text" name="kd_pemeliharaan" id="kd_pemeliharaan" class="form-control" required="true" readonly="">
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalPemeliharaan"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Pelaksana</label>
              <div class="col-sm-6">
                <input type="text" name="pelaksana" id="pelaksana" class="form-control" required="true" readonly="">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Kode Jadwal</label>
              <div class="col-sm-6">
                <input type="text" name="kd_jadwal" id="kd_jadwal" class="form-control" required="true" readonly="">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Pemeliharaan</label>
              <div class="col-sm-6">
                <input type="text" name="tgl_pemeliharaan" id="tgl_pemeliharaan" class="form-control" required="true" readonly="">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">No.Seri</label>
              <div class="col-sm-6">
                <input type="text" name="no_seri" id="no_seri" class="form-control" required="true" readonly="">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Nama Alat</label>
              <div class="col-sm-6">
                <input type="text" name="nm_alat" id="nm_alat" class="form-control" required="true" readonly="">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Tipe</label>
              <div class="col-sm-6">
                <input type="text" name="tipe" id="tipe" class="form-control" required="true" readonly="">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Merek</label>
              <div class="col-sm-6">
                <input type="text" name="merek" id="merek" class="form-control" required="true" readonly="">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Kode Lokasi</label>
              <div class="col-sm-6">
                <input type="text" name="kd_lokalat" id="kd_lokalat" class="form-control" required="true" readonly="">
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
            <div class="form-group">
             
              <div class="col-sm-6">
                <input type="hidden" name="nip" id="nip" class="form-control" required="true" readonly="">
              </div>
            </div>
            <div class="col-sm-1 pull-right">
              <button type="submit" class="btn btn-primary" name="entryhasil">Simpan</button>
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