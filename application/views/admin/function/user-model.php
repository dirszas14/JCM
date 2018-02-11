<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['tambahuser'])) 
{
	$nip =$_POST['nip'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$level = $_POST['level'];
	$agama = $_POST['agama'];
	$bagian = $_POST['bagian'];
	// $tgl_lahir = $_POST['tgl_lahir'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$no_tlp = $_POST['no_tlp'];
	$j_kel= $_POST['j_kel'];
	$tgl_lahir=date('Y-m-d',strtotime($_POST['tgl_lahir']));
  	// $photo   = $_FILES['photo']['name'];
  	// $direktori   = "gambaruser/".basename($_FILES['photo']['name']);
  	// $msg="";
	$query = "INSERT INTO user (nip,nama,alamat,level,bagian,agama,tgl_lahir,tmp_lahir,no_tlp,j_kel,password) VALUES
			('$nip','$nama','$alamat','$level','$bagian','$agama','$tgl_lahir','$tmp_lahir','$no_tlp','$j_kel','$no_tlp')";
			
	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	header('location:../page/user/user.php?info=Berhasil di tambah');
}


elseif(isset($_POST['edituser']))
{
	$nip =$_POST['nip'];
	$niplama = $_POST['niplama'];
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	$alamat = $_POST['alamat'];
	$agama = $_POST['agama'];
	// $tgl_lahir = $_POST['tgl_lahir'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$no_tlp = $_POST['no_tlp'];
	$bagian = $_POST['bagian'] ;
	$j_kel= $_POST['j_kel'];
	$tgl_lahir=date('Y-m-d',strtotime($_POST['tgl_lahir']));
	$query = "UPDATE user SET nip='$nip', nama='$nama', level='$level', bagian='$bagian', alamat='$alamat', agama='$agama', tgl_lahir='$tgl_lahir', tmp_lahir='$tmp_lahir', no_tlp='$no_tlp' WHERE nip='$niplama' ";
	$result=mysqli_query($koneksi,$query);
	header('location:../page/user/user.php?info=Berhasil diubah');
}


elseif(isset($_POST['hapususer']))
{
	$nip=$_POST['nip'];

	$query="DELETE FROM user WHERE nip='$nip'";
	$result=mysqli_query($koneksi,$query);
	header('location:../page/user/user.php?info=Berhasil di hapus');
}

elseif(isset($_POST['editprofile']))
{
	$nip =$_POST['nip'];
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	
	$alamat = $_POST['alamat'];
	$agama = $_POST['agama'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$no_tlp = $_POST['no_tlp'];
	$j_kel= $_POST['j_kel'];
	$fotolama = $_POST['fotolama'];
	$tgl_lahir=date('Y-m-d',strtotime($_POST['tgl_lahir']));
	$photo   = $_FILES['photo']['name'];
  	$direktori   = "gambaruser/".basename($_FILES['photo']['name']);
  	$msg="";
  	if(empty($photo)){
  		$query = "UPDATE user SET alamat='$alamat', agama='$agama', tgl_lahir='$tgl_lahir', tmp_lahir='$tmp_lahir', no_tlp='$no_tlp' WHERE nip='$nip' ";
  		$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
  		header('location:../page/user/lihatprofil.php?info=Berhasil diubah');
  	}
	elseif (!empty($photo)) {
		$query = "UPDATE user SET alamat='$alamat', agama='$agama', tgl_lahir='$tgl_lahir', tmp_lahir='$tmp_lahir', no_tlp='$no_tlp', foto='$photo' WHERE nip='$nip' ";
		$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));  		
  		if (move_uploaded_file($_FILES['photo']['tmp_name'],$direktori))
	{
		unlink("gambaruser/".$fotolama);
		header('location:../page/user/lihatprofil.php?info=Berhasil diubah');
	} 
	else
	{
		$msg= "there was a prblem uploading image";
	}
	}
	
	$_SESSION['nip'] = $nip;
}elseif(isset($_POST['editpassword']))
{
	$nip = $_POST['nip'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	if($password != $confirmpassword)
	{
		header('location:../page/user/editpassword.php?info=Password tidak sama');
	}else{
		$query="UPDATE user SET password='$password' WHERE nip='$nip'";
		$result=mysqli_query($koneksi,$query);
		header('location:../page/user/editpassword.php?info=Password berhasil diganti');
	}
}elseif(isset($_POST['resetpassword']))
{
	$nip = $_POST['nip'];
	$no_tlp = $_POST['no_tlp'];
	$query = "UPDATE user SET no_tlp='$no_tlp', password='$no_tlp' WHERE nip='$nip'";
	$result=mysqli_query($koneksi,$query);
	header("location:../page/user/user.php?info=Password berhasil direset&nip=$nip");
}


 ?>
