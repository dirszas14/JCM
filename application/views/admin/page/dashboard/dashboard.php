  <?php require_once '../template/header.php'; ?>
  <?php require_once '../../function/koneksi.php'; ?>

	<div class="wrapper">
	<body class="hold-transition skin-blue sidebar-mini">
	  <?php require_once '../template/headermain.php' ?>
	  <?php require_once '../template/asidebar.php' ?>	
	  <!-- =============================================== -->

	  <!-- Left side column. contains the sidebar -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Dashboard
	        <small>Informasi Pemeliharaan</small>
	      </h1>
	    </section>
	    <?php      
        // $sql ="SELECT count(*) totalpemeliharaan FROM hsl_pemeliharaan WHERE ";
        $sql = "SELECT hsl_pemeliharaan.kd_hasil, hsl_pemeliharaan.j_pemeliharaan, hsl_pemeliharaan.keterangan,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai, pemeliharaan.kd_pemeliharaan, pemeliharaan.nip, COUNT(*) AS totalpemeliharaan 
            FROM hsl_pemeliharaan
            INNER JOIN jadwal ON hsl_pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON hsl_pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON hsl_pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            INNER JOIN pemeliharaan ON hsl_pemeliharaan.kd_pemeliharaan = pemeliharaan.kd_pemeliharaan
            WHERE date(tgl_pemeliharaan) = CURDATE() "; 
        $query1=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi)); 
        $result1 = mysqli_fetch_assoc($query1);   
        $hasilpemeliharaan=$result1['totalpemeliharaan'];

        //untuk teknisi
        $pelaksana = $_SESSION['nip'];
        $sqlteknisi = "SELECT pemeliharaan.kd_pemeliharaan, pemeliharaan.nip,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai , COUNT(*) AS pemeliharaan
            FROM pemeliharaan
            INNER JOIN jadwal ON pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            WHERE date(tgl_pemeliharaan) = CURDATE() AND pemeliharaan.nip='$pelaksana'"; 
        $queryteknisi=mysqli_query($koneksi,$sqlteknisi) or die(mysqli_error($koneksi)); 
        $resultteknisi = mysqli_fetch_assoc($queryteknisi);   
        $pemeliharaan=$resultteknisi['pemeliharaan'];
        ?>

	      <section class="content">
      <div class="row">
      <div class="col-sm-4">
          <div class="small-box bg-blue">
            <div class="inner">
              <h2><?= date('F Y'); ?></h2>
              <br>
              <p>Calendar</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="dashboard.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


<?php if ($_SESSION['level']=='Teknisi') :?>
<div class="col-sm-4">
          <div class="small-box bg-green">
            <div class="inner">
              <h2><?=$pemeliharaan?></h2>
              <br>
              <p>Pemeliharaan Hari Ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a href="dashboard.php?pemeliharaan=true" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
  <?php endif ?>

<?php if ($_SESSION['level']=='Kepala Instalasi') :?>
		<div class="col-sm-4">
          <div class="small-box bg-green">
            <div class="inner">
              <h2><?=$hasilpemeliharaan?></h2>
              <br>
              <p>Hasil Pemeliharaan Hari Ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a href="dashboard.php?lihatpemeliharaan=true" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
    <?php endif ?>
</div>

		<?php if (isset($_GET['lihatpemeliharaan'])): ?>
      <div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Pemeliharaan Hari Ini</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          
        <br>
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover table-bordered table-striped text-center table-data" id="contoh" width="100%">
            <thead>
             <tr>
               <th>NO.</th>
                <th>KODE HASIL</th>
                <th>JENIS PEMELIHARAAN</th>
                <th>Tanggal Pemeliharaan</th>
                <th>NAMA ALAT</th>
                <th>TIPE</th>
                <th>MEREK</th>
                <th>NAMA LOKASI</th>
                <th>LANTAI</th>
                <th>PELAKSANA</th>
                <th>KETERANGAN</th>
              </tr>
            </thead>
            <tbody>
          <?php 
          $sql = "SELECT hsl_pemeliharaan.kd_hasil, hsl_pemeliharaan.j_pemeliharaan, hsl_pemeliharaan.keterangan,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai, pemeliharaan.kd_pemeliharaan, user.nip, user.nama
            FROM hsl_pemeliharaan
            INNER JOIN user ON hsl_pemeliharaan.nip = user.nip
            INNER JOIN jadwal ON hsl_pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON hsl_pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON hsl_pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            INNER JOIN pemeliharaan ON hsl_pemeliharaan.kd_pemeliharaan = pemeliharaan.kd_pemeliharaan 
            WHERE date(tgl_pemeliharaan)=CURDATE() AND keterangan='Tervalidasi'"; 
            $query = mysqli_query($koneksi,$sql);
            $no =1;
            ?>
          <?php while ($data = mysqli_fetch_assoc($query)): ?>
          <tr>
                
              <td><?php echo $no++?></td>
              <td><?php echo $data['kd_hasil']; ?></td>
              <td><?php echo $data['j_pemeliharaan']; ?></td>
              <td><?php echo $data['tgl_pemeliharaan']; ?></td>
              <td><?php echo $data['nm_alat']; ?></td>
              <td><?php echo $data['tipe']; ?></td>
              <td><?php echo $data['merek']; ?></td>
              <td><?php echo $data['nm_lokasi']; ?></td>
              <td><?php echo $data['lantai']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['keterangan']; ?></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
        
      <?php endif ?>

      <?php if (isset($_GET['pemeliharaan'])): ?>
      <div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Pemeliharaan Hari Ini</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          
        <br>
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover table-bordered table-striped text-center table-data" id="contoh" width="100%">
            <thead>
             <tr>
               <th>NO.</th>
                <th>KODE PEMELIHARAAN</th>
                <th>PELAKSANA</th>
                <th>KODE JADWAL</th>
                <th>Tanggal Pemeliharaan</th>
                <th>NO SERI</th>
                <th>NAMA ALAT</th>
                <th>TIPE</th>
                <th>MEREK</th>
                <th>KODE LOKASI</th>
                <th>NAMA LOKASI</th>
                <th>Lantai</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
          <?php 
          $nip = $_SESSION['nip'];
         $sqlteknisi = "SELECT pemeliharaan.kd_pemeliharaan, pemeliharaan.status,user.nip, user.nama,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai
            FROM pemeliharaan
            INNER JOIN jadwal ON pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON pemeliharaan.no_seri = alat.no_seri
            INNER JOIN user ON pemeliharaan.nip = user.nip
            INNER JOIN lokasi_alat ON pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            WHERE date(tgl_pemeliharaan) = CURDATE() AND user.nip='$nip' AND pemeliharaan.status IS NULL"; 
            $query = mysqli_query($koneksi,$sqlteknisi) or die(mysqli_error($koneksi));
            $no =1;
            ?>
          <?php while ($data = mysqli_fetch_assoc($query)): ?>
          <tr>               
              <td><?php echo $no++?></td>
              <td><?php echo $data['kd_pemeliharaan']; ?></td>
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
              <td><a method="POST" href="../../page/pemeliharaan/ambilintruksi.php?kd_pemeliharaan=<?php echo $data['kd_pemeliharaan']; ?>" class="btn btn-primary">Ambil</a>
                    <input type="hidden" name="kd_pemeliharaan" value="<?php echo $data['kd_pemeliharaan']; ?>"></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
        
      <?php endif ?>
				</div>
			</div>
     
	    </section>
	    <!-- /.content -->
	  </div>

	  <!-- =============================================== -->
	 
	  <div class="control-sidebar-bg"></div>
	</div>


	<?php require_once '../template/footer.php'; ?>
	<script type="text/javascript">
		
	</script>

