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
      <input type="text" name="judul" class="form-control" required="true" value="<?=$artikel['judul_artikel']?>" >
    </div>
  </div>
 <div class="form-group">
    <label class="col-sm-2 control-label">Kategori</label>
    <div class="col-sm-2">
    <select name="kategori" class="form-control custom-select">
      <option value="">Pilih Kategori</option>
      <?php
        foreach ($kategori as $k){
      echo "<option value=" .$k->id_kategori . ">" . $k->kategori . "</option>";
    }
    echo "</select>";
    ?>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Isi Artikel</label>
    <div class="col-sm-10">
      <textarea name="isiartikel" id="isiartikel" class="form-control" rows="10" cols="80""><?=$artikel['isi_artikel']?></textarea>
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
 </div>
  </div>
</div>
</section>