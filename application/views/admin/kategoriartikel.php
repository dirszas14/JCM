    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Kategori Artikel
        </h1>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
    <div class="box box-solid box-default">
      <!-- box header -->
      <div class="box-header with-border">
        <h3 class="box-title">List Kategori</h3>
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
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahkategori">Tambah Kategori</a>
            </div>
          </div><br>
        <div class="box-body no-padding">
          <table class="table table-bordered table-striped" id="tabel_user" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="width:5px;">NO</th>
                <th>Kategori</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             <?php
              $no = 1;
              foreach($kategori as $k){
              ?>
              <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td align="center"><?=$k->kategori?> </td>
                <td align="center"><a href="<?=site_url("Crud_artikel/hapus_kategori/$k->id_kategori")?>" class="btn btn-danger">Hapus</a>
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

<div id="tambahkategori" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Tambah Kategori</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" action="<?php echo site_url('crud_artikel/tambah_kategori')?>" method='post' enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Kategori</label>
    <div class="col-sm-10">
      <input type="text" name="kategori" class="form-control" required="true">
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
