<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Approve
    </h1>

      <?php if ($this->session->flashdata('info')): ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i>Info</h4>
          Berhasil
        </div>
      <?php endif ?>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
  <div class="box box-solid box-default">
    <!-- box header -->
    <div class="box-header with-border">
      <h3 class="box-title">Detail Kandidat Anggota</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>

      </div>
    </div>
    <!-- box body -->
    <div class="box-body"><form class="form-horizontal" action="<?=site_url()?>crud_anggota/approve_proses/<?=$detail['id'];?>" method='post' enctype="multipart/form-data">
      <div class="form-group">
    <label class="col-xs-12 text-center" style="font-size:38px;"><?=$detail['nama']?></label>
  </div><br>
    <div class="form-group">
    <div class="col-xs-12 text-center">
      <img style="max-width:70%;max-height:70%;" src="<?=base_url()?>assets/img/<?=$detail['foto_fullbody'];?>" class="img-rounded" alt="Full Body">
    </div>
  </div><br>
  <div class="form-group">
    <div class="col-xs-12 text-center">
      <img style="max-width:70%;max-height:70%;" src="<?=base_url()?>assets/img/<?=$detail['foto_closeup'];?>" class="img-rounded" alt="Close Up">
    </div>
  </div><br>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Lengkap</label>
    <div class="col-sm-8">
      <input type="text" name="nama" class="form-control" required="true" disabled value="<?=$detail['nama'];?>" >
      <input type="hidden" name="nama" class="form-control" required="true" disabled value="<?=$detail['id'];?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Usia</label>
    <div class="col-sm-5">
      <input type="text" name="usia" class="form-control" value="<?=$detail['usia'];?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">No. HP</label>
    <div class="col-sm-8">
      <input type="text" name="no_hp" class="form-control" value="<?=$detail['no_telp'];?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kota Domisili</label>
    <div class="col-sm-6">
      <input type="text" name="domisili" class="form-control" disabled value="<?=$detail['kota_domisili'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-6">
      <input type="text" name="tmp_lahir" class="form-control" disabled value="<?=$detail['tempat_lahir'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-6">
      <input type="text" name="tgl_lahir" class="form-control" disabled value="<?=$detail['tgl_lahir'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tinggi Badan</label>
    <div class="col-sm-3">
      <input type="text" name="tinggibadan" class="form-control" disabled value="<?=$detail['tinggi_badan'];?>">
    </div>
    <label class="col-sm-2 control-label">Berat Badan</label>
    <div class="col-sm-3">
      <input type="text" name="beratbadan" class="form-control" disabled value="<?=$detail['berat_badan'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Status Pernikahan</label>
    <div class="col-sm-6">
      <input type="text" name="status" class="form-control" disabled value="<?=$detail['status'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pengalaman</label>
    <div class="col-sm-10">
      <textarea name="pengalaman" class="form-control" disabled><?=$detail['pengalaman']?></textarea>
    </div>
  </div>
   <div class="form-group">
      <label class="col-sm-2 control-label">Grade</label>
    <div class="col-sm-4">
      <select name="grade" class="form-control custom-select" id="" required>
        <option value="">Pilih Grade</option>
        <option value="Mawar">Mawar</option>
        <option value="Melati">Melati</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Insentif</label>
    <div class="col-sm-8">
      <input type="text" name="insentif_tampil" class="form-control" disabled value="<?php $format_angka = number_format($detail['insentif'], "2", ",", ".");
                            echo "Rp. ".$format_angka; ?>">
    </div>
    <div class="col-sm-10">
      <input type="hidden" name="insentif" class="form-control" disabled value="<?=$detail['insentif'];?>">
    </div>
  </div>
  <!--   <div class="form-group">
    <label class="col-sm-2 control-label">Foto</label>
    <div class="col-sm-10">
      <input type="file" name="photo">
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-sm-2 pull-right">
      <button type="submit" class="btn btn-success">Approve</button>
    </div>
  </div>
</form>
</div>
</div>
</section>
</div>
</div>
</div>
</section>