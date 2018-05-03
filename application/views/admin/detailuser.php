<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Detail User
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
      <h3 class="box-title">Detail</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>

      </div>
    </div>
    <!-- box body -->
    <div class="box-body">
      <form class="form-horizontal" action="<?php echo site_url('crud_user/reset_pw')?>" method='post' enctype="multipart/form-data">
   <div class="form-group">
    <div class="col-xs-12 text-center">
      <img style="max-width:70%;max-height:70%;" class="fotodetail" src="<?=base_url()?>assets/img/<?=$foto;?>" class="img-rounded" alt="Foto">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-8">
      <input type="text" name="nama" class="form-control" value="<?=$nama?>" required="true">
    </div>
    <div class="col-sm-4">
      <input type="hidden" name="id_user" class="form-control" value="<?=$id_user?>" required="true">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-2 control-label">Level</label>
    <div class="col-sm-8">
    <input type="text" name="nama" class="form-control" value="<?=$level?>" required="true" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">No.Telp</label>
    <div class="col-sm-8">
      <input type="text" name="no_telp" class="form-control" value="<?=$no_telp?>" required="true">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 pull-right">
      <button href="<?=base_url()?>Admin/user" class="btn btn-success">DONE</button>
    </div>
    <div class="col-sm-2 pull-right">
      <button type="submit" class="btn btn-danger" name="reset_pw">RESET PASSWORD</button>
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
