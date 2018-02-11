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
          <h3 class="box-title">Lokasi Alat</h3>
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
            <a href="tambahlokasi.php" class="btn btn-primary">Tambah Lokasi</a>
          </div>
        </div>
        <?php endif ?>
        <br>
         <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="contoh" width="100%">
          <thead>
          <tr>
            <th>NO</th>
            <th>Kode Lokasi</th>
            <th>LOKASI</th>
            <th>LANTAI</th>
            <th>OPSI</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            $sql = "SELECT * FROM lokasi_alat";
            $query = mysqli_query($koneksi,$sql);
            $no =1;
            ?>

             <?php while ($data = mysqli_fetch_assoc($query)): ?>
               <tr>
                 <td><?php echo $no++?></td>
                  <td><?php echo $data['kd_lokalat']; ?></td>
                  <td><?php echo $data['nm_lokasi']; ?></td>
                  <td><?php echo $data['lantai']; ?></td>
                  <td> <?php if ($_SESSION['level'] =='Administrasi' ): ?>
                    <a method="POST" href="editlokasi.php?kd_lokalat=<?php echo $data['kd_lokalat']; ?>" class="btn btn-warning">Ubah</a>
                    <input type="hidden" name="kd_lokalat" value="<?php echo $data['kd_lokalat']; ?>">
                  <a method="POST" href="hapuslokasi.php?kd_lokalat=<?php echo $data['kd_lokalat']; ?>" class="btn btn-danger">Hapus</a>
                  <input type="hidden" name="kd_lokalat" value="<?php echo $data['kd_lokalat']; ?>">
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



<?php require_once '../template/footer.php'; ?>
