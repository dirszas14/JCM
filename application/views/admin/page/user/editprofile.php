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
          <h3 class="box-title">Ubah User</h3>
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
                <input type="text" name="nip" class="form-control" required="true" value="<?php echo $nip?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" required="true" value="<?php echo $data['nama']; ?>" >
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
                <select name="level" class="form-control" id="">
                  <option value="">Pilih Level</option>
                  <option value="Kepala Instalasi" <?php if($data['level']=="Kepala Instalasi") echo 'selected="selected"'; ?>>Kepala Instalasi</option>
                  <option value="Kepala Unit" <?php if($data['level']=="Kepala Unit") echo 'selected="selected"'; ?>>Kepala Unit</option>
                  <option value="Administrasi" <?php if($data['level']=="Administrasi") echo 'selected="selected"'; ?>>Administrasi</option>
                  <option value="Teknisi" <?php if($data['level']=="Teknisi") echo 'selected="selected"'; ?>>Teknisi</option>
                  <option value="Supervisor" <?php if($data['level']=="Supervisor") echo 'selected="selected"'; ?>>Supervisor</option>
                </select>
              </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Bagian</label>
              <div class="col-sm-10">
                <select name="bagian" class="form-control" id="">
                  <option value="">Pilih Bagian</option>
                  <option value="IPSRS" <?php if($data['bagian']=="IPSRS") echo 'selected="selected"'; ?>>IPSRS</option>
                  <option value="ICU" <?php if($data['bagian']=="ICU") echo 'selected="selected"'; ?>>ICU</option>
                  <option value="HCU" <?php if($data['bagian']=="HCU") echo 'selected="selected"'; ?>>HCU</option>
                  <option value="IGD" <?php if($data['bagian']=="IGD") echo 'selected="selected"'; ?>>IGD</option>
                  <option value="OKA" <?php if($data['bagian']=="OKA") echo 'selected="selected"'; ?>>OKA</option>
                  <option value="MELATI" <?php if($data['bagian']=="Melati") echo 'selected="selected"'; ?>>Melati</option>
                  <option value="MAWAR" <?php if($data['bagian']=="Mawar") echo 'selected="selected"'; ?>>Mawar</option>
                  <option value="ANGGREK" <?php if($data['bagian']=="Anggrek") echo 'selected="selected"'; ?>>Anggrek</option>
                  <option value="Radiologi" <?php if($data['bagian']=="Radiologi") echo 'selected="selected"'; ?>>Radiologi</option>
                  <option value="Radiodiagnostik" <?php if($data['bagian']=="Radiodiagnostik") echo 'selected="selected"'; ?>>Radiodiagnostik</option>
                </select>
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
                <input type="file" name="foto">
              </div>
            </div>
            <div class="col-sm-2 pull-right">
              <input type="hidden" name="niplama" value="<?php echo $nip?>">
              <button type="submit" class="btn btn-primary" name="edituser">UPDATE</button>
            </div>
            <div class="col-sm-4 pull-left">
              
              <button type="submit" class="btn btn-primary" name="resetpassword">RESET PASSWORD</button>
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
