<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['login'])) {
	$nip = $_POST['nip'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE nip='$nip' AND password = '$password' ";
	$query = mysqli_query($koneksi,$sql);

	if (mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		$_SESSION['nip']	= $result['nip'];
		$_SESSION['nama'] = $result['nama'];		
		$_SESSION['level']	= $result['level'];
		$_SESSION['bagian']	= $result['bagian'];
		$_SESSION['password']	= $result['password'];
		$_SESSION['foto'] = $result['foto'];
		header('location:../page/dashboard/dashboard.php'); 
	}else{
		header('location:../page/login/login.php?info=Maaf username dan password tidak cocok');
	}
}elseif(isset($_GET['logout'])){
	session_destroy();
	session_unset();
	header('location:../index.php');
}
 
 ?>