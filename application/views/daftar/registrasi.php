<div class="canvas-head" id="home">
  <div class="cover-head">
  <div class="container" >
    <div class="cover-text" style="padding:180px 0px; text-align: center;">
  <h1 style="color: white;">Jakarta Center Management</h1>
  <h1 style="color: white;"> Registrasi Anggota</h1>
  </div>
  </div>
  </div>
</div>
<div class="container registrasi"><br>
<h4 class="text-center">Form Registrasi Anggota</h4><br>
<div class="card">
<form class="form-horizontal" action="<?php echo site_url('crud_anggota/regisanggota_proses')?>" method='post' enctype="multipart/form-data">
  <div class="card-header bg-info text-white">
    Form Daftar
  </div>
  <div class="card-body"> 
    <div class="form-group offset-sm-3">
      <label class="col-sm-3 control-label font-weight-bold">Nama Lengkap</label>
    <div class="col-sm-7">
      <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group offset-sm-3">
    <label class="col-sm-3 control-label font-weight-bold">E-Mail Aktif</label>
    <div class="col-sm-7">
      <input type="email" name="email" placeholder="E-mail Aktif" class="form-control" >
    </div>
  </div>
  <div class="form-group offset-sm-3">
    <label class="col-sm-3 control-label font-weight-bold">Usia</label>
    <div class="col-sm-4 input-group">
      <input type="number" name="usia" class="form-control" placeholder="Usia" onkeypress="return isNumberKey(event)">
      <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Tahun</span>
</div>
    </div>
  </div>
  <div class="form-group offset-sm-3">
    <label class="col-sm-3 control-label font-weight-bold">No Hp.Aktif</label>
    <div class="col-sm-5">
      <input type="number" placeholder="No. HP Aktif" name="no_telp" class="form-control" maxlength="13" onkeypress="return isNumberKey(event)">
    </div>
  </div>
  <div class="form-group offset-sm-3">
    <label class="col-sm-2 control-label font-weight-bold">Domisili</label>
    <div class="col-sm-7">
      <input type="text" name="domisili" placeholder="Domisili" class="form-control" >
    </div>
  </div>
  <div class="form-group offset-sm-3">
  <label class="col-sm-3 control-label font-weight-bold">Tempat Lahir</label>
    <div class="col-sm-7">
      <input type="text" name="tmp_lahir" placeholder="Tempat Lahir" class="form-control"> 
    </div>
  </div>
  <div class="form-group offset-sm-3">
<label class="col-sm-3 control-label font-weight-bold">Tanggal Lahir</label>
    <div class="col-sm-7">
      <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control" >
    </div>
  </div>
  <div class="form-group offset-sm-3">
      <label class="col-sm-3 control-label font-weight-bold">Tinggi Badan</label>
    <div class="col-sm-4 input-group">
      <input type="number" name="tinggibadan" placeholder="Tinggi Badan" class="form-control" maxlength="3" onkeypress="return isNumberKey(event)">
       <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">CM</span>
  </div>
    </div>
</div>
    <div class="form-group offset-sm-3">
      <label class="col-sm-3 control-label font-weight-bold">Berat Badan</label>
    <div class="col-sm-4 input-group">
      <input type="number" name="beratbadan" placeholder="Berat Badan" class="form-control" maxlength="3" onkeypress="return isNumberKey(event)">
      <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">KG</span>
    </div>
  </div>
</div>
  <div class="form-group offset-sm-3">
  <label class="col-sm-3 control-label font-weight-bold">Status Pernikahan</label>
    <div class="col-sm-5">
      <select name="status" class="form-control custom-select" id="">
        <option selected>Pilih status pernikahan</option>
        <option value="Belum Menikah">Belum Menikah</option>
        <option value="Sudah Menikah">Sudah Menikah</option>
        <option value="Bercerai">Bercerai</option>
      </select>
    </div>
  </div>
  <div class="form-group offset-sm-3">
   <label class="col-sm-3 control-label font-weight-bold">Pengalaman</label>
    <div class="col-sm-10">
      <textarea name="pengalaman" placeholder="Pengalaman" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group offset-sm-3">
  <label class="col-sm-4 control-label font-weight-bold">Insentif yang Diingikan Per 8 Jam</label>
    <div class="col-sm-6 input-group">
      <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Rp.</span>
      </div>
      <input type="number" name="insentif" class="form-control" maxlength="9" onkeypress="return isNumberKey(event)">
    </div>
  </div>
   <div class="form-group offset-sm-3">
<label class="col-sm-3 control-label font-weight-bold">Foto Close-Up</label>
    <div class="col-sm-5">
  <label class="custom-file">
     <input type="file" class="custom-file-input" id="close_up" name="close_up" aria-describedby="fileHelp">
        <label class="custom-file-label" for="close_up">
           Pilih File...
        </label>
  </label>
</div>
  </div>
   <div class="form-group offset-sm-3">
   <label class="col-sm-3 control-label font-weight-bold">Foto Full-Body</label>
    <div class="col-sm-5">
  <label class="custom-file">
     <input type="file" class="custom-file-input" id="full_body" name="full_body" aria-describedby="fileHelp">
        <label class="custom-file-label" for="full_body">
           Pilih file...
        </label>
  </label>
</div>
  </div>
  <!--   <div class="form-group">
    <label class="col-sm-2 control-label">Foto</label>
    <div class="col-sm-10">
      <input type="file" name="photo">
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary btn-block" name="tambahuser">Submit</button>
    </div>
  </div>
</div>
 
</form>
</div>
</div>

