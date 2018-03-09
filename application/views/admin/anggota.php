<div class="wrapper">
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Keanggotaan Jakarta Center Management
        </h1>
        <br>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box box-solid box-primary">
            <!-- box header -->
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Anggota JCM</h3>
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
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahanggota">Tambah Anggota</a>
                </div>
              </div>
              <br>
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-striped" id="tabel_anggota" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA ANGGOTA</th>
                      <th>TEMPAT LAHIR</th>
                      <th>TANGGAL LAHIR</th>
                      <th>USIA</th>
                      <th>TINGGI/BERAT</th>
                      <th>TRACK RECORD</th>
                      <th>KELAS</th>
                      <th>NO TELP</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Tes</td>
                      <td>Jakarta</td>
                      <td>09 Maret 1990</td>
                      <td>27</td>
                      <td>165/70</td>
                      <td>lorem ipsum dolor sit amet</td>
                      <td>A</td>
                      <td>088888888</td>
                      <td><a method="POST" href="#" class="btn btn-warning">Ubah</a>
                      <input type="hidden" name="nip" value="#"></td>
                      <td><a method="post" href="#" class="btn btn-danger">Hapus</a>
                      <input type="hidden" name="nip" value="#">
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Tes2</td>
                    <td>Jakarta</td>
                    <td>09 Maret 1990</td>
                    <td>27</td>
                    <td>165/70</td>
                    <td>lorem ipsum dolor sit amet</td>
                    <td>A</td>
                    <td>088888888</td>
                    <td><a method="POST" href="#" class="btn btn-warning">Ubah</a>
                    <input type="hidden" name="nip" value="#"></td>
                    <td><a method="post" href="#" class="btn btn-danger">Hapus</a>
                    <input type="hidden" name="nip" value="#">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php if($this->session->userdata('level')=="Super Admin"): ?>
      <div class="box box-solid box-primary">
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
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser">Tambah User</a>
            </div>
          </div>
          <br>
          <div class="box-body table-responsive no-padding">
            <table class="table table-bordered table-striped" id="tabel_user" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID USER</th>
                  <th>NAMA</th>
                  <th>PASSWORD</th>
                  <th>LEVEL</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>coba1</td>
                  <td>Coba Satu</td>
                  <td>12345</td>
                  <td>Admin Level 1</td>
                  <td><a method="POST" href="#" class="btn btn-warning">Ubah</a>
                  <input type="hidden" name="nip" value="#"></td>
                  <td><a method="post" href="#" class="btn btn-danger">Hapus</a>
                  <input type="hidden" name="nip" value="#">
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Coba2</td>
                <td>Coba Dua</td>
                <td>12345</td>
                <td>Admin Level 2</td>
                <td><a method="POST" href="#" class="btn btn-warning">Ubah</a>
                <input type="hidden" name="nip" value="#"></td>
                <td><a method="post" href="#" class="btn btn-danger">Hapus</a>
                <input type="hidden" name="nip" value="#">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>
</section>
</div>
</div>
</div>
</section>
<!-- Modal -->
<div id="tambahanggota" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Tambah Anggota</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" action="<?php echo site_url('crud/tambahanggota_proses')?>" method='post' enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Lengkap</label>
    <div class="col-sm-8">
      <input type="text" name="nama" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Usia</label>
    <div class="col-sm-5">
      <input type="text" name="usia" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">No. HP</label>
    <div class="col-sm-8">
      <input type="text" name="no_telp" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kota Domisili</label>
    <div class="col-sm-6">
      <input type="text" name="domisili" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-6">
      <input type="text" name="tmp_lahir" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-6">
      <input type="text" name="tgl_lahir" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tinggi Badan</label>
    <div class="col-sm-3">
      <input type="text" name="tinggibadan" class="form-control" required="true" placeholder="Cm">
    </div>
    <label class="col-sm-2 control-label">Berat Badan</label>
    <div class="col-sm-3">
      <input type="text" name="beratbadan" class="form-control" required="true" placeholder="Kg">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Status Pernikahan</label>
    <div class="col-sm-10">
      <select name="status" class="form-control" id="">
        <option value="">Pilih Status</option>
        <option value="Belum Menikah">Belum Menikah</option>
        <option value="Sudah Menikah">Sudah Menikah</option>
        <option value="Bercerai">Bercerai</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pengalaman</label>
    <div class="col-sm-10">
      <textarea name="pengalaman" class="form-control"></textarea>
    </div>
  </div>
   <div class="form-group">
      <label class="col-sm-2 control-label">Grade</label>
    <div class="col-sm-10">
      <select name="grade" class="form-control" id="">
        <option value="">Pilih Grade</option>
        <option value="A">A</option>
        <option value="B">B</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Insentif</label>
    <div class="col-sm-10">
      <input type="text" name="insentif" class="form-control" required="true" placeholder="Per 8 jam">
    </div>
  </div>
  <!--   <div class="form-group">
    <label class="col-sm-2 control-label">Foto</label>
    <div class="col-sm-10">
      <input type="file" name="photo">
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-sm-8">
    </div>
    <div class="col-sm-2">
      <button type="submit" class="btn btn-primary" name="tambahuser">Simpan</button>
    </div>
    <div class="col-sm-2">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!-- Modal -->

<div id="tambahuser" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Tambah User</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" action="<?php echo site_url('crud/tambahuser_proses')?>" method='post' enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" name="nama" class="form-control" required="true">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-2 control-label">Level</label>
    <div class="col-sm-10">
      <select name="level" class="form-control" id="">
        <option value="">Pilih Level</option>
        <option value="Super Admin">Super Admin</option>
        <option value="Admin">Admin</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">No.Telp</label>
    <div class="col-sm-10">
      <input type="text" name="no_telp" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-offset-2 col-sm-10">Id User Otomatis</label>
  </div>
  <div class="form-group">
    <label class="col-sm-offset-2 col-sm-10">Password awal akan sama dengan nomor telepon</label>
  </div>
  <div class="form-group">
    <div class="col-sm-8">
    </div>
    <div class="col-sm-2">
      <button type="submit" class="btn btn-primary" name="tambahuser">Simpan</button>
    </div>
    <div class="col-sm-2">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
