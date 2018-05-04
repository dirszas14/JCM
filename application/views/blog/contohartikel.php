<div class="canvas-head" id="home">
  <div class="cover-head">
  <div class="container" > 
    <div class="cover-text" style="padding:180px 0px; text-align: center;">
  <h1 style="color: white;">Jakarta Center Management</h1>
  <h1 style="color: white;"> BLOG</h1>
  </div>
  </div>
  </div>
</div>

	<div class="container canvas-artikel">
	<div class="row">
	<div class="col-md-8 mt-2" >
		<img class="mx-auto d-block" style="max-width:70%;max-height: 70%;" src="<?=base_url()?>assets/img/<?=$viewartikel['cover_foto'];?>" alt="">
     <div class="row text-center">
          <div class="col-md-6">
            <br><p class="font-weight-light"><i class="fa fa-user" aria-hidden="true"></i> Admin - <?=$viewartikel['nama_user'];?></p>
          </div>
          <div class="col-md-6">
            <br><p class="font-weight-light"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=date_indo($viewartikel['tanggal']);?></p>
          </div>
        </div>
		<h3><?=$viewartikel['judul_artikel']?> </h3>
		<p><?=$viewartikel['isi_artikel']?></p>

	</div>
 
	<div class="col-md-4 mt-2">
		<h3>Recent Posts</h3>
		<div class="list-group">
   <?php
    foreach($recentpost as $rp){
    ?>  
  <a href="<?php echo site_url("Crud_artikel/viewartikel/$rp->id_artikel")?>" class="list-group-item list-group-item-action"><?=$rp->judul_artikel;?></a>
  <?php } ?>
</div><br>
<h3>Category</h3>
		<div class="list-group">
 <?php
    foreach($category as $c){
    ?>  
  <a href="#" class="list-group-item list-group-item-action"><?=$c->kategori;?></a>
  <?php } ?>
</div>
</div>
</div>
</div>

