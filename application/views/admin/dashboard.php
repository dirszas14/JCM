	  <!-- Left side column. contains the sidebar -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Dashboard
	        <small>Informasi</small>
	      </h1>
	    </section>


	      <section class="content">

        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?=$totaluser?></h3>
              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url('admin/user') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$totalmawar?></h3>

              <p>Total Member Mawar</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-o"></i>
            </div>
            <a href="<?php echo base_url('admin/anggota') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
              <h3><?=$totalmelati?></h3>

              <p>Total Member Melati</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-o"></i>
            </div>
            <a href="<?php echo base_url('admin/anggota') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?=$totalartikel?></h3>

              <p>Total Artikel</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$totalapproval?></h3>

              <p>Members Approval</p>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
            <a href="<?php echo base_url('admin/approve') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

       <div class="row">
      <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Member Terbaru</h3>

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
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
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
