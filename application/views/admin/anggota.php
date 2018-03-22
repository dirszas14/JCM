    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Keanggotaan Jakarta Center Management
        </h1>
          <?php if ($this->session->flashdata('info')): ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i>Berhasil</h4>
            </div>
          <?php endif ?>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box box-solid box-default">
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
              <div class="box-body no-padding">
                <table class="table table-bordered table-striped" id="tabel_anggota" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID ANGGOTA</th>
                      <th>NAMA</th>
                      <th>USIA</th>
                      <th>TEMPAT, TANGGAL LAHIR</th>
                      <th>NO. HP</th>
                      <th>DOMISILI</th>
                      <th>CM/KG</th>
                      <th>STATUS</th>
                      <th>GRADE</th>
                      <th>INSENTIF</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                     $no = 1;
                      foreach($anggota as $x){
                      ?>
                    <tr>
                      <td align="Center"><?=$no++ ?></td>
                      <td><?=$x->id_anggota?></td>
                      <td><?=$x->nama?></td>
                      <td><?=$x->usia.' Tahun' ?></td>
                      <td><?=$x->tempat_lahir.', '.$x->tgl_lahir  ?></td>
                      <td><?=$x->no_telp?></td>
                      <td><?=$x->kota_domisili?></td>
                      <td><?=$x->tinggi_badan.'/'.$x->berat_badan ?></td>
                      <td><?=$x->status?></td>
                      <td><?=$x->grade?></td>
                      <td><?php $format_angka = number_format($x->insentif, "2", ",", ".");
                            echo "Rp. ".$format_angka; ?></td>
                      <td><a  href="<?=site_url("Crud_anggota/hapus_anggota/$x->id_anggota")?>" class="btn btn-info">Detail</a>
                      <input type="hidden" name="nip" value="#">
                      </td>
                      <td><a href="<?php echo site_url('crud_anggota/hapus_anggota/',$x->id_anggota)?>" class="btn btn-warning">Ubah</a>
                      <input type="hidden" name="id_anggota" value="<?php echo $x->id_anggota;?>"></td>
                      <td><a  href="<?=site_url("Crud_anggota/hapus_anggota/$x->id_anggota")?>" class="btn btn-danger">Hapus</a>
                      <input type="hidden" name="nip" value="#">
                    </td>
                  </tr>
                <?php } ?>
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
<form class="form-horizontal" action="<?php echo site_url('crud_anggota/tambahanggota_proses')?>" method='post' enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Lengkap</label>
    <div class="col-sm-8">
      <input type="text" name="nama" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Usia</label>
    <div class="col-sm-5">
      <input type="text" name="usia" class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">No. HP</label>
    <div class="col-sm-8">
      <input type="text" name="no_telp" class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kota Domisili</label>
    <div class="col-sm-6">
      <input type="text" name="domisili" class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-6">
      <input type="text" name="tmp_lahir" class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-6">
      <input type="text" name="tgl_lahir" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tinggi Badan</label>
    <div class="col-sm-3">
      <input type="text" name="tinggibadan" class="form-control"  placeholder="Cm">
    </div>
    <label class="col-sm-2 control-label">Berat Badan</label>
    <div class="col-sm-3">
      <input type="text" name="beratbadan" class="form-control" placeholder="Kg">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Status Pernikahan</label>
    <div class="col-sm-6">
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
      <label class="col-sm-2 control-label">Grade</label>
    <div class="col-sm-4">
      <select name="grade" class="form-control custom-select" id="">
        <option selected>Pilih Grade</option>
        <option value="Mawar">Mawar</option>
        <option value="Melati">Melati</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Insentif</label>
    <div class="col-sm-10">
      <input type="text" name="insentif" class="form-control"  placeholder="Per 8 jam">
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
