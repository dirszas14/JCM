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
        <br>
        <?php if(isset($_GET['info'])) {?>
        <div class="alert alert-success alert-dismissable">
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
          <h3 class="box-title">Daftar Pemeliharaan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
           <?php if ($_SESSION['level'] =='Administrasi' ): ?>
        <div class="row">
          <div class="col-sm-2 pull-right">
            <a href="intruksi.php" class="btn btn-primary">Intruksi</a>
          </div>
        </div>
        <?php endif ?>
        <br>
         <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="contoh" width="100%">
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
                <th>LOKASI</th>
                <th>Lantai</th>
                <th>STATUS</th>
                <th>OPSI</th>
          </tr>
          </thead>
          <tbody>
            <?php if ($_SESSION['level'] =='Administrasi' ): ?> 
              <?php
            $sql = "SELECT pemeliharaan.kd_pemeliharaan, pemeliharaan.status, user.nip, user.nama,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai 
            FROM pemeliharaan
            INNER JOIN user ON pemeliharaan.nip = user.nip
            INNER JOIN jadwal ON pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            "; 
            ?>
            <?php endif ?>

            <?php if ($_SESSION['level'] =='Teknisi' ): ?> 
              <?php
            $nip = $_SESSION['nip'] ; 
            $sql = "SELECT pemeliharaan.kd_pemeliharaan, pemeliharaan.status,user.nip, user.nama,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai 
            FROM pemeliharaan
            INNER JOIN user ON pemeliharaan.nip = user.nip
            INNER JOIN jadwal ON pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            WHERE user.nip = '$nip' AND pemeliharaan.status IS NULL  "; 
            ?>
            <?php endif ?>

            <?php $query = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
            $no =1;
            ?>

             <?php while ($data = mysqli_fetch_assoc($query)): ?>
              <tr class="pilihintruksi" datakd_pemeliharaan="<?php echo $data['kd_pemeliharaan']; ?>">
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
              <td><?php echo $data['status']; ?></td>
                  <td> <?php if ($_SESSION['level'] =='Administrasi' ): ?>
                    <a method="POST" href="editintruksi.php?kd_pemeliharaan=<?php echo $data['kd_pemeliharaan']; ?>" class="btn btn-warning">Ubah</a>
                    <input type="hidden" name="no_seri" value="<?php echo $data['no_seri']; ?>">
                  <a method="POST" href="hapusintruksi.php?kd_pemeliharaan=<?php echo $data['kd_pemeliharaan']; ?>" class="btn btn-danger">Hapus</a>
                  <input type="hidden" name="kd_pemeliharaan" value="<?php echo $data['kd_pemeliharaan']; ?>">
                  <?php endif ?>

                  <?php if ($_SESSION['level'] =='Teknisi' ): ?>

              <a method="POST" href="ambilintruksi.php?kd_pemeliharaan=<?php echo $data['kd_pemeliharaan']; ?>" class="btn btn-primary">Ambil</a>
                    <input type="hidden" name="kd_pemeliharaan" value="<?php echo $data['kd_pemeliharaan']; ?>">
                  <?php endif ?>
                </td>
                       
              </tr>
             <?php endwhile; ?>
          </tbody>
        </table>
      </div>

        </div>
      </div>

      </div>
    </section>
</div>
</div>

<!-- <div class="modal fade" id="ModalAmbil" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ambil Jadwal</h4>
      </div>

      <div class="modal-body">
        <form class="form-horizontal" action="../../function/pemeliharaan-model.php" method="get" accept-charset="utf-8">
           <div class="form-group">
              <label class="col-sm-2 control-label">KODE</label>
              <div class="col-sm-10">
                <input type="text" name="kd_pemeliharaan" id="kd_pemeliharaan" class="form-control" required="true" value="">
              </div>
            </div>
        </form>
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Ambil Lah</button>
      </div>
    </div>
  </div>
</div> -->



<?php require_once '../template/footer.php'; ?>
