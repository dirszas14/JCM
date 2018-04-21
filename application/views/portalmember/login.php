
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PORTAL MEMBER - Jakarta Center Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css')?>">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/style.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css" media="screen">
        body{
                -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
                -webkit-animation-duration: 10s; /* Safari 4.0 - 8.0 */
                -webkit-animation-iteration-count: infinite; /* Safari 4.0 - 8.0 */
                animation-name: bgColor;
                animation-duration: 16s;
                animation-iteration-count: infinite;
            }

            @-webkit-keyframes fadein {
                from {bottom: 0; opacity: 0;} 
                to {bottom: 30px; opacity: 1;}
            }

            @keyframes fadein {
                from {bottom: 0; opacity: 0;}
                to {bottom: 30px; opacity: 1;}
            }

            @-webkit-keyframes fadeout {
                from {bottom: 30px; opacity: 1;} 
                to {bottom: 0; opacity: 0;}
            }

            @keyframes fadeout {
                from {bottom: 30px; opacity: 1;}
                to {bottom: 0; opacity: 0;}
            }
            /* Safari 4.0 - 8.0 */
            @-webkit-keyframes bgColor {
                0% {background-color:#dd4b39;}
                33% {background-color:#06A6D1;}
                66% {background-color:#912985;}
                100% {background-color:#dd4b39;}
            }

            /* Standard syntax */
            @keyframes bgColor {
                0% {background-color:#dd4b39;}
                33% {background-color:#06A6D1;}
                66% {background-color:#912985;}
                100% {background-color:#dd4b39;}
            }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>JAKARTA CENTER MANAGEMENT</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">LOGIN PORTAL MEMBER</p>

    <form action="<?php echo site_url('LoginPortalMember/proses') ?>" method="post">
      <?php if (validation_errors() || $this->session->flashdata('result_login')) { ?>
            <div class="alert alert-danger animated fadeInDown" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Peringatan!</strong>
                <?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('result_login'); ?>
            </div>
      <?php } ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-offset-8 col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat"  aria-label="Center Align">
            LOGIN   <span class="fa fa-sign-in" aria-hidden="true"></span>
          </button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
