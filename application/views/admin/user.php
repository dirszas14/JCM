    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        User Jakarta Center Management
        </h1>

          <?php if ($this->session->flashdata('info')): ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i>Info</h4>
              Berhasi
            </div>
          <?php endif ?>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
      <div class="box box-solid box-default">
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
          <div class="box-body no-padding">
            <table class="table table-bordered table-striped" id="tabel_user" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID USER</th>
                  <th>NAMA</th>
                  <th>LEVEL</th>
                  <th>NO.HP</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
               <?php
                $no = 1;
                foreach($user as $u){
                ?>
                <tr>
                  <td align="center"><?php echo $no++ ?></td>
                  <td><?=$u->id_user?> </td>
                  <td><?=$u->nama?></td>
                  <td><?=$u->level?></td>
                  <td><?=$u->no_telp?></td>
                  <td><a method="POST" href="#" class="btn btn-info">Detail</a>
                  <td><a href="<?=site_url("Email/send")?>" class="btn btn-warning">Reset Password</a>
                  <td><a href="<?=site_url("Crud_user/hapus_user/$u->id_user")?>" class="btn btn-danger">Hapus</a>
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
<div id="tambahuser" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Tambah User</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" action="<?php echo site_url('crud_user/tambahuser_proses')?>" method='post' enctype="multipart/form-data">
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
