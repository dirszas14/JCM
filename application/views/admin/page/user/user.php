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
          <h3 class="box-title">Daftar User</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
        <div class="row">
          <div class="col-sm-2 pull-right">
            <a href="tambahuser.php" class="btn btn-primary">Tambah User</a>
          </div>
        </div>
        <br>
         <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="contoh" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA USER</th>
            <th>ALAMAT</th>
            <th>NO TELP</th>
            <th>LEVEL</th>
            <th>BAGIAN</th>
            <th>OPSI</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            $sql = "SELECT * FROM user";
            $query = mysqli_query($koneksi,$sql);
            $no =1;
            ?>

             <?php while ($data = mysqli_fetch_assoc($query)): ?>
               <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $data['nip']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php echo $data['no_tlp']; ?></td>
                  <td><?php echo $data['level']; ?></td>
                  <td><?php echo $data['bagian']; ?></td>
                  <td> <a method="POST" href="editprofile.php?nip=<?php echo $data['nip']; ?>" class="btn btn-warning">Ubah</a>
                    <input type="hidden" name="nip" value="<?php echo $data['nip']; ?>">
                  <a method="post" href="hapususer.php?nip=<?php echo $data['nip']; ?>" class="btn btn-danger">Hapus</a>
                  <input type="hidden" name="nip" value="<?php echo $data['nip']; ?>">
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
