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
<h4>Form Registrasi Anggota</h4><br>
<form class="form-horizontal" action="<?php echo site_url('crud_anggota/regisanggota_proses')?>" method='post' enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Lengkap</label>
    <div class="col-sm-6">
      <input type="text" name="nama" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Email Aktif</label>
    <div class="col-sm-6">
      <input type="text" name="email" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Usia</label>
    <div class="col-sm-2 input-group">
      <input type="text" name="usia" class="form-control" required="true" onkeypress="return isNumberKey(event)">
      <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Tahun</span>
</div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">No. HP Aktif</label>
    <div class="col-sm-4">
      <input type="text" name="no_telp" class="form-control" required="true" maxlength="13" onkeypress="return isNumberKey(event)">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kota Domisili</label>
    <div class="col-sm-4">
      <input type="text" name="domisili" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-4">
      <input type="text" name="tmp_lahir" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-4">
      <input type="text" name="tgl_lahir" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tinggi Badan</label>
    <div class="col-sm-2 input-group">
      <input type="text" name="tinggibadan" class="form-control" required="true" maxlength="3" onkeypress="return isNumberKey(event)">
       <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">CM</span>
  </div>
    </div>
</div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Berat Badan</label>
    <div class="col-sm-2 input-group">
      <input type="text" name="beratbadan" class="form-control" required="true" maxlength="3" onkeypress="return isNumberKey(event)">
      <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">KG</span>
    </div>
  </div>
</div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Status Pernikahan</label>
    <div class="col-sm-4">
      <select name="status" class="form-control custom-select" id="">
        <option selected>Pilih status pernikahan</option>
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
    <label class="col-sm-4 control-label">Insentif Yang Diinginkan per 8 Jam</label>
    <div class="col-sm-3 input-group">
    	<div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Rp.</span></div>
      <input type="text" name="insentif" class="form-control" required="true" maxlength="9" onkeypress="return isNumberKey(event)">
    </div>
  </div>
   <div class="form-group">
   	<label class="col-sm-4 control-label">Foto Close Up</label>
   	<div class="col-sm-3">
	<label class="custom-file">
		 <input type="file" class="custom-file-input" id="exampleInputFile" aria-describedby="fileHelp">
        <label class="custom-file-label" for="exampleInputFile">
           Pilih File...
        </label>
	</label>
</div>
  </div>
   <div class="form-group">
   	<label class="col-sm-4 control-label">Foto Full Body</label>
   	<div class="col-sm-3">
	<label class="custom-file">
		 <input type="file" class="custom-file-input" id="exampleInputFile" aria-describedby="fileHelp">
        <label class="custom-file-label" for="exampleInputFile">
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
    <div class="col-sm-6">
    	<button type="submit" class="btn btn-primary" name="tambahuser">Submit</button>
    </div>
  </div>
</form>
</div>
