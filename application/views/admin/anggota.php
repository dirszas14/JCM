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
<form class="form-horizontal" action="#" method='post' enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">No.KTP</label>
    <div class="col-sm-10">
      <input type="text" name="nip" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">No. HP (Selalu aktif)</label>
    <div class="col-sm-10">
      <input type="text" name="nama" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kota Tempat Tinggal</label>
    <div class="col-sm-10">
      <textarea name="alamat" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-6">
      <input type="text" name="nama" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Bagian</label>
    <div class="col-sm-10">
      <select name="bagian" class="form-control" id="">
        <option value="">Pilih Bagian</option>
        <option value="IPSRS">IPSRS</option>
        <option value="ICU">ICU</option>
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
<p>Some text in the modal.</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>