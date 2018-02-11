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
          <h3 class="box-title">Tambah User</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <form class="form-horizontal" action="../../function/user-model.php" method='post' enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-2 control-label">NIP</label>
              <div class="col-sm-10">
                <input type="text" name="nip" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <textarea name="alamat" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
                <select name="level" class="form-control" id="">
                  <option value="">Pilih Level</option>
                  <option value="Kepala Instalasi">Kepala Instalasi</option>
                  <option value="Kepala Unit">Kepala Unit</option>
                  <option value="Administrasi">Administrasi</option>
                  <option value="Teknisi">Teknisi</option>
                  <option value="Supervisor">Supervisor</option>
                </select>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Bagian</label>
              <div class="col-sm-10">
                <select name="bagian" class="form-control" id="">
                  <option value="">Pilih Bagian</option>
                  <option value="IPSRS">IPSRS</option>
                  <option value="ICU">ICU</option>
                  <option value="HCU">HCU</option>
                  <option value="UGD">UGD</option>
                  <option value="OKA">OKA</option>
                  <option value="Melati">Melati</option>
                  <option value="Mawar">Mawar</option>
                  <option value="Anggrek">Anggrek</option>
                  <option value="Radiologi">Radiologi</option>
                  <option value="Radiodiagnostik">Radiodiagnostik</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Agama</label>
              <div class="col-sm-10">
                <select name="agama" class="form-control" id="">
                  <option value="">Pilih Agama</option>
                  <option value="Islam">Islam</option>
                  <option value="Protestan">Protestan</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_lahir" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" name="tmp_lahir" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">No Telp</label>
              <div class="col-sm-10">
                <input type="text" name="no_tlp" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="j_kel" value="Laki-Laki">
                      Laki-Laki
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="j_kel"  value="Perempuan">
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>
            </div>
          <!--   <div class="form-group">
              <label class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" name="photo">
              </div>
            </div> -->
            <div class="form-group">
              <label class="col-sm-offset-2 col-sm-10">Password awal akan sama dengan nomor telepon</label>
            </div>
            <div class="form-group">
            <div class="col-sm-2 pull-right">
              <button type="submit" class="btn btn-primary" name="tambahuser">Simpan</button>
            </div>
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