    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Ubah Password
        </h1>
        <?php if(isset($_GET['info'])) :?>
          <?php if ($_GET['info'] =='Password tidak sama'): ?>
            <div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= $_GET['info'] ?>
            </div>  
            <?php else: ?>
              <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= $_GET['info'] ?>
            </div>
          <?php endif;?>
        <?php endif; ?>
      </section>
      
    <!-- Main content -->
    <section class="content">
		  <!-- Default box -->
      <div class="box box-solid box-default">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Password</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
         
          <form class="form-horizontal" action="<?php echo site_url('crud_user/ubahpassword')?>" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">Password Baru</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Konfirmasi Password</label>
              <div class="col-sm-10">
                <input type="password" name="confirmpassword" class="form-control" required="true">
              </div>
            </div> 
            <div class=" pull-right">
              <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
              <button type="submit" class="btn btn-primary" name="editpassword">Simpan</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>