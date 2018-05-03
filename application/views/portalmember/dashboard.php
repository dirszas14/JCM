	  <!-- Left side column. contains the sidebar -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Informasi
	      </h1>
	    </section>


	      <section class="content">

       
  <div class="row">
      <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Member <?=$this->session->userdata('grade');?> Terbaru</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?=$totalanggotaterbaru?> New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php
                     $no = 1;
                      foreach($anggotaterbaru as $x){
                      ?>
                     
                    <li>
                      <img class="recent" src="<?=base_url()?>assets/img/<?=$x->foto_closeup;?>" alt="User Image">
                      <a class="users-list-name" href="#"><?=$x->nama?></a>
                      <span class="users-list-date"><?=$x->grade?></span>
                      <span class="users-list-date"><?php $date=date("Y-m-d"); 
                      if($x->tanggal_gabung == $date){
                        echo "Hari ini";
                      } else {
                        $fix=date_indo($x->tanggal_gabung);
                        echo $fix ;
                      }?></span>
                    </li>
                    <?php } ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                 <div class="box-footer text-center">
                 <?php 
                 $link = "";
                 if($this->session->userdata('grade')=="Mawar"){
                 	$link = "Modelmawar";
                 }
                 else{
                 	$link= "Modelmelati";
                 }
                 ?>
                  <a href="<?php echo site_url($link) ?>" target="_blank" class="uppercase">Lihat Semua Anggota <?=$this->session->userdata('grade');?></a>
                </div>

</div>

			</div>
    </div>
	    </section>
	    <!-- /.content -->
	  </div>

	  <!-- =============================================== -->

	  <div class="control-sidebar-bg"></div>
	</div>



	<script type="text/javascript">

	</script>
