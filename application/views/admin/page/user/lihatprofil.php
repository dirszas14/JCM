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
          Profile
        </h1>
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
          <h3 class="box-title">Profile</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>

        <?php
$nip=$_SESSION['nip'];
$sql= "SELECT * FROM user WHERE nip='$nip' ";
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_assoc($query);
?>

        <!-- box body -->
        <div class="box-body">
          <form class="form-horizontal" action="../../function/user-model.php" method='post' enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-2 control-label">NIP</label>
              <div class="col-sm-10">
                <input type="text" name="nip" class="form-control" required="true" value="<?php echo $nip?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" required="true" value="<?php echo $data['nama']; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <textarea name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
                <input type="level" name="level" class="form-control" required="true" value="<?php echo $data['level']; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Agama</label>
              <div class="col-sm-10">
                <select name="agama" class="form-control" id="">
                  <option value="">Pilih Agama</option>
                  <option value="Islam" <?php if($data['agama']=="Islam") echo 'selected="selected"'; ?>>Islam</option>
                  <option value="Protestan" <?php if($data['agama']=="Protestan") echo 'selected="selected"'; ?>>Protestan</option>
                  <option value="Katolik" <?php if($data['agama']=="Katolik") echo 'selected="selected"'; ?>>Katolik</option>
                  <option value="Hindu" <?php if($data['agama']=="Hindu") echo 'selected="selected"'; ?>>Hindu</option>
                  <option value="Buddha" <?php if($data['agama']=="Buddha") echo 'selected="selected"'; ?>>Buddha</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_lahir" class="form-control" required="true" value="<?php echo $data['tgl_lahir']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" name="tmp_lahir" class="form-control" required="true" value="<?php echo $data['tmp_lahir']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">No Telp</label>
              <div class="col-sm-10">
                <input type="text" name="no_tlp" class="form-control" required="true" value="<?php echo $data['no_tlp']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="j_kel" value="L" <?=$data['j_kel']=="L" ? "checked" : ""?>>
                      Laki-Laki
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="j_kel"  value="P" <?=$data['j_kel']=="P" ? "checked" : ""?>>
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" name="photo">
              </div>
            </div>
              <div class="form-group">
                <div class="col-sm-10 pull-right"> 
              <img src="../../function/gambaruser/<?=$data['foto'];?>" width="175" height="200" />
            </div>
            </div>
            <div class="col-sm-1 pull-right">
              <button type="submit" class="btn btn-primary" name="editprofile">UPDATE</button>
              <input type="hidden" name="fotolama" value="<?php echo $data['foto'];?>">
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>

<?php require_once '../template/footer.php'; ?>
 <script>
  
  $('input[name=tgl_lahir]').datepicker({ format: 'dd-m-yyyy' });
  </script>