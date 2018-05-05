

<div class="canvas-head" id="home">
  <div class="cover-head">
  <div class="container">
    <div class="cover-text">
  <h1 style="color: white;">Jakarta Center Management</h1>
  <p style="color: white;">Ingin berkarir di dunia Talent bersama kami ? Daftarkan diri anda</p>
  <div class="row">
    <div class="col-md-3"><a class="btn btn-info btn-lg col-md-12" href="<?php echo site_url('daftarmember') ?>" role="button">Registrasi Member <i class="fa fa-arrow-right"></i></a></div>
    </div>
  </div>
  </div>
  </div>
</div>

<br>
<section class="canvas-visimisi text-center" id="tentang">
  <h1 class="display-2 text-center">About Us</h1><br>
  <blockquote class="blockquote">
    <h3 class="mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</h3>
  <footer class="blockquote-footer">MOTTO <cite title="Source Title">JCM</cite></footer>
</blockquote>
    <h1 class="display-3">VISI</h1>
    <div class="container">
        <p class="text-justify">Menjadi Agency terdepan dan terpercaya di Indonesia dalam bidang penyedia jasa SPG dan Modeling dengan kualitas pelayanan terbaik yang dapat memberikan kontribusi nyata bagi pengguna jasa</p>
        </div>
        <h1 class="display-3">MISI</h1>
    <div class="container">
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum maiores optio laudantium earum vel, soluta itaque dolorem quidem ipsum sint rerum fugit asperiores, in porro unde sunt, illo quo ipsa.</p>
        </div>
  </section>
  <section class="canvas-services text-center" id="services">
    <div class="container">
      <h1 class="display-2">Our Services</h1>
      <p>Dengan kematangan pengalaman yang kami miliki disertai dengan semangat profesionalisme yang tinggi, kami berusaha memberikan yang terbaik pada setiap event dan pelayanan yang kami berikan. Kami selalu berkomitmen untuk selalu menjaga kepuasaan anda terhadap setiap jasa yang kami deliver demi menciptakan long term relationship. Senyum anda, kebanggan kami.</p>
     <div class="row">
   <div class="col">
      <i class="fa fa-users fa-3x" aria-hidden="true"></i>
      <hr>
      <h3>SPG</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit reiciendis accusantium exercitationem, sint maxime molestiae officia perferendis illo facilis veniam totam eaque deleniti sequi mollitia esse possimus, aspernatur recusandae. Repudiandae!</p>
   </div>
   <div class="col">
      <i class="fa fa-microphone fa-3x" aria-hidden="true"></i>
      <hr>
      <h3>MC</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit reiciendis accusantium exercitationem, sint maxime molestiae officia perferendis illo facilis veniam totam eaque deleniti sequi mollitia esse possimus, aspernatur recusandae. Repudiandae!</p>
   </div>
   <div class="col">
     <i class="fa fa-camera fa-3x" aria-hidden="true"></i>
      <hr>
      <h3>Modelling</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit reiciendis accusantium exercitationem, sint maxime molestiae officia perferendis illo facilis veniam totam eaque deleniti sequi mollitia esse possimus, aspernatur recusandae. Repudiandae!</p>
   </div>
   <div class="col">
      <i class="fa fa-heart fa-3x" aria-hidden="true"></i>
      <hr>
      <h3>Bridesmaid</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit reiciendis accusantium exercitationem, sint maxime molestiae officia perferendis illo facilis veniam totam eaque deleniti sequi mollitia esse possimus, aspernatur recusandae. Repudiandae!</p>
   </div>
   <div class="col">
     <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
      <hr>
      <h3>Dan Lain-lain</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit reiciendis accusantium exercitationem, sint maxime molestiae officia perferendis illo facilis veniam totam eaque deleniti sequi mollitia esse possimus, aspernatur recusandae. Repudiandae!</p>
   </div>
</div>
    </div>
  </section>
  <section class="canvas-anggota text-center" id="member">
    <br>
    <h1 style="color: white ; font-family:'Ubuntu', sans-serif;">Member</h1><br>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="canvas-classa">

          <h1 style="color:white;">Mawar</h1><br>
           <?php
            $kolom=2;
            $barismulai=0;
            $lebarbs=12/$kolom;?>
          <div class="row">
            <?php
            foreach($member_content as $mc){
            ?>  
            <div class="col-md-6">
               <img class="img-fluid model-photo mb-2" src="<?=base_url()?>assets/img/<?=$mc->foto_fullbody;?>" alt="Card image cap">
            </div>
            <?php
                $barismulai++;
            if ($barismulai%$kolom == 0) 
              echo '</div><div class="row">';
            }
            ?>
          </div><br>
          <a href="<?php echo site_url('modelmawar/') ?>" class="btn btn-info">Lihat Semua</a>
        </div>
        </div>
        <div class="col">
          <div class="canvas-classb">

          <h1 style="color:black;">Melati</h1><br>
           <?php
            $kolom=2;
            $barismulai=0;
            $lebarbs=12/$kolom;?>
          <div class="row">
            <?php
            foreach($member_content_mel as $mcm){
            ?>  
            <div class="col-md-6">
                <img class="img-fluid model-photo mb-2" src="<?=base_url()?>assets/img/<?=$mcm->foto_fullbody;?>" alt="Card image cap">
            </div>
             <?php
                $barismulai++;
            if ($barismulai%$kolom == 0) 
              echo '</div><div class="row">';
            }
            ?>
          </div>
          <br>
          <a href="<?php echo site_url('modelmelati') ?>" class="btn btn-info">Lihat Semua</a>
        </div>
      </div>
    </div>
  </div><br>
</section>
<section class="canvas-blog" id="blog">
  <h1 class="display-2 text-center">BLOG</h1>
  <div class="container">
    <?php
      $kolom=3;
      $barismulai=0;
      $lebarbs=12/$kolom;?>
    <div class="row pb-2">
      <?php
    foreach($artikel_home as $ah){
    ?>  
      <div class="col-12 col-md-<?=$lebarbs;?> text-center">
        <img class="img-fluid mx-auto" src="<?php echo base_url('assets/img/avatar3.png'); ?>" alt="">
        <div class="row">
          <div class="col">
            <br><p class="font-weight-light"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=date_indo($ah->tanggal);?></p>
          </div>
        </div>
        <h3><?=$ah->judul_artikel;?></h3>
           <p class="text-truncate" style="max-height: 300px;"><?=substr($ah->isi_artikel, 0, 200);?> ....</p>
           <div class="row">
             <div class="col-md-12 text-center pb-2"><a href="<?php echo site_url("Crud_artikel/viewartikel/$ah->id_artikel")?>" class="btn btn-primary">Read More</a></div>
           </div>
        </div>
        <?php
        $barismulai++;
        if ($barismulai%$kolom == 0) 
          echo '</div><div class="row pb-2">';
        }
        ?>

      </div>
    </div>
  </div>
   <div class="text-center"><a class="btn btn-primary" href="<?=site_url('crud_artikel')?>">Lihat Semua</a></div>
</section>
<section class="canvas-client text-center" id="client">
  <div class="container">
    <h1 class="display-2">Our Clients</h1><br>
    <div class="row">
      <div class="col-md-4">
        <img class="img-fluid logo-client" src="<?php echo base_url('assets/img/indosat.png') ?>" alt="">
      </div>
      <div class="col-md-4">
        <img class="img-fluid logo-client" src="<?php echo base_url('assets/img/tokopedia.jpg') ?>" alt="">
      </div><div class="col-md-4">
        <img class="img-fluid logo-client" src="<?php echo base_url('assets/img/lazada.jpg') ?>" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <img class="img-fluid logo-client" src="<?php echo base_url('assets/img/indosat.png') ?>" alt="">
      </div>
      <div class="col-md-4">
        <img class="img-fluid logo-client" src="<?php echo base_url('assets/img/indosat.png') ?>" alt="">
      </div>
      <div class="col-md-4">
        <img class="img-fluid logo-client" src="<?php echo base_url('assets/img/indosat.png') ?>" alt="">
      </div>
    </div>
  </div>
</section>
<section class="canvas-contact" id="contact">
  <div class="container text-center"><br>
    <h1>CONTACT</h1>
    <div class="row kontak">
      <div class="col">
        <h2>Phone: <i class="fa fa-phone" aria-hidden="true"></i> 08xxxxxxx</h2>
      </div>
      <div class="col">
        <h2>Alamat: <i class="fa fa-map-marker" aria-hidden="true"></i> Jl. .....</h2>
      </div>
    </div>
  </div>
</section>
