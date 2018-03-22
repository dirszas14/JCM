    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Artikel
        </h1>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box box-solid box-default">
            <!-- box header -->
            <div class="box-header with-border">
              <h3 class="box-title">Form Artikel</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- box body -->
            <div class="box-body">
           <form class="form-horizontal" action="<?php echo site_url('crud_artikel/tambahartikel_proses')?>" method='post' enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Judul Artikel</label>
    <div class="col-sm-6">
      <input type="text" name="judul" class="form-control" required="true">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tags</label>
    <div class="col-sm-2">
      <input type="text" name="tags" class="form-control" required="true")">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Isi Artikel</label>
    <div class="col-sm-10">
      <textarea name="isiartikel" id="isiartikel" class="form-control" style="height:300px"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-6 pull-right">
      <button type="submit" class="btn btn-primary" name="publish">Publish</button>
    </div>
  </div>
</form>
          </div>
        </div>

        <!-- Default box -->
    <div class="box box-solid box-default">
      <!-- box header -->
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Artikel</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>

        </div>
      </div>
      <!-- box body -->
      <div class="box-body">
        <div class="box-body no-padding">
          <table class="table table-bordered table-striped" id="tabel_user" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>NO</th>
                <th>JUDUL ARTIKEL</th>
                <th>TAGS</th>
                <th>TANGGAL POST</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             <?php
              $no = 1;
              foreach($artikel as $a){
              ?>
              <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td align="center"><?=$a->judul_artikel?> </td>
                <td align="center"><?=$a->tags?></td>
                <td align="center"><?=$a->tanggal?></td>
                <td align="center"><a method="POST" href="#" class="btn btn-warning">Ubah</a>
                <td align="center"><a href="<?=site_url("Crud_artikel/hapus_artikel/$a->id_artikel")?>" class="btn btn-danger">Hapus</a>
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
