<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Profile Anggota
    </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
  <div class="box box-solid box-default">
    <!-- box header -->
    <div class="box-header with-border">
      <h3 class="box-title">Detail Profile</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>

      </div>
    </div>
    <!-- box body -->
    <div class="box-body">
      <form class="form-horizontal" action="<?php echo site_url('admin/anggota')?>" method='post' enctype="multipart/form-data">
   <div class="form-group">
    <label class="col-xs-12 text-center" style="font-size:38px;"><?=$dataanggota['nama']?></label>
  </div><br>
    <div class="form-group">
    <div class="col-xs-12 text-center">
      <img class="fotodetail" src="<?=base_url()?>assets/img/<?=$dataanggota['foto_fullbody'];?>" class="img-rounded" alt="Full Body">
    </div>
  </div><br>
  <div class="form-group">
    <div class="col-xs-12 text-center">
      <img class="fotodetail" src="<?=base_url()?>assets/img/<?=$dataanggota['foto_closeup'];?>" class="img-rounded" alt="Close Up">
    </div>
  </div><br>
  <!--   <div class="form-group">
    <label class="col-sm-2 control-label">Foto</label>
    <div class="col-sm-10">
      <input type="file" name="photo">
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-sm-2 pull-right">
      <button type="submit" class="btn btn-success">DONE</button>
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
