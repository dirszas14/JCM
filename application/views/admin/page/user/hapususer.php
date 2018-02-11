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
          <h3 class="box-title">Hapus User</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>

        <!-- box body -->
        <div class="box-body">
          <?php
          $nip=$_GET['nip'];
          $sql= "SELECT * FROM user WHERE nip='$nip' ";
          $query = mysqli_query($koneksi,$sql);
          $data = mysqli_fetch_assoc($query);
          ?>
          
          <form class="form-horizontal" action="../../function/user-model.php" method='post'>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">NIP</label>
              <div class="col-sm-10">
                <input type="text" name="nip" class="form-control" required="true" value="<?php echo $nip?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" required="true" value="<?php echo $data['nama']; ?>" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <textarea name="alamat" class="form-control" readonly><?php echo $data['alamat']; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" readonly>Level</label>
                <div class="col-sm-10">
                <input type="text" name="level" class="form-control" required="true" value="<?php echo $data['level']; ?>" readonly >
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label" readonly>Bagian</label>
                <div class="col-sm-10">
                <input type="text" name="bagian" class="form-control" required="true" value="<?php echo $data['bagian']; ?>" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" readonly>Agama</label>
                <div class="col-sm-10">
                <input type="text" name="agama" class="form-control" required="true" value="<?php echo $data['agama']; ?>" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input readonly type="text" name="tgl_lahir" class="form-control" required="true" value="<?php echo $data['tgl_lahir']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input readonly type="text" name="tmp_lahir" class="form-control" required="true" value="<?php echo $data['tmp_lahir']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">No Telp</label>
              <div class="col-sm-10">
                <input type="text" name="no_tlp" class="form-control" required="true" value="<?php echo $data['no_tlp']; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
               <div class="col-sm-10">
                <input type="text" name="j_kel" class="form-control" required="true" value="<?php echo $data['j_kel']; ?>" readonly >
              </div>
            </div>
            <div class="col-sm-2 pull-right">
              <button type="submit" class="btn btn-primary" name="hapususer">HAPUS</button>
            </div>          
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


<?php require_once '../template/footer.php'; ?>
