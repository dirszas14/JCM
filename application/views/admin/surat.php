<div class="wrapper">
  <body class="hold-transition skin-blue sidebar-mini">

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Surat Pengantar
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
      <div class="box box-solid box-primary">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Surat Pengantar</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
<!--         <?php
$nip=$_SESSION['nip'];
$sql= "SELECT * FROM user WHERE nip='$nip' ";
$query = mysqli_query($koneksi,$sql);
$row = mysqli_fetch_assoc($query);
?> -->
        <div class="box-body">
         
          <form class="form-horizontal" action="../../function/user-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kepada</label>
              <div class="col-sm-10">
                <input type="text" name="password" class="form-control" required="true">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <textarea name="password" class="form-control" required="true"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal</label>
              <div class="col-sm-10">
                <input type="text" name="confirmpassword" class="form-control" required="true">
              </div>
            </div> 
             <div class="form-group">
              <label class="col-sm-2 control-label">Event</label>
              <div class="col-sm-10">
                <input type="text" name="password" class="form-control" required="true">
              </div>
            </div>
            <div class=" pull-right">
              <input type="hidden" name="nip" value="<?php echo $nip?>">
              <button type="submit" class="btn btn-primary" name="editpassword">Buat</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>