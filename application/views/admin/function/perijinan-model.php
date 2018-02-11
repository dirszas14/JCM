<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['updateperijinan'])) 
{
	$kd_pemeliharaan = $_POST['kd_pemeliharaan'];
	$status = 'Diizinkan';

	$query = "UPDATE pemeliharaan SET status='$status' WHERE kd_pemeliharaan='$kd_pemeliharaan'";

	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	header('location:../page/pemeliharaan/perijinan.php?info=Diijinkan');
}

?>