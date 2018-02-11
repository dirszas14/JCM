<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['tambahalat'])) 
{
	$no_seri =$_POST['no_seri'];
	$nm_alat = $_POST['nm_alat'];
	$w_pemeliharaan = $_POST['w_pemeliharaan'];
	$tipe = $_POST['tipe'];
	$merek = $_POST['merek'];
	$kd_lokalat = $_POST['kd_lokalat'];
	// $tgl_lahir = $_POST['tgl_lahir'];
	$tgl_beli=date('Y-m-d',strtotime($_POST['tgl_beli']));
	$query = "INSERT INTO alat (no_seri, nm_alat, tgl_beli, w_pemeliharaan, tipe, merek, kd_lokalat) VALUES
			('$no_seri','$nm_alat','$tgl_beli','$w_pemeliharaan','$tipe','$merek', '$kd_lokalat')";

	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	header('location:../page/alat/alat.php?info=Berhasil di tambah');
}

elseif(isset($_POST['hapusalat']))
{
	$no_seri=$_POST['no_seri'];

	$query="DELETE FROM alat WHERE no_seri='$no_seri'";
	$result=mysqli_query($koneksi,$query);
	if ($result===TRUE)
	{
	header('location:../page/alat/alat.php?info=Berhasil di hapus');
	}

}

elseif (isset($_POST['editalat'])) 
{
	$no_seri =$_POST['no_seri'];
	$no_serilama = $_POST['no_serilama'];
	$nm_alat = $_POST['nm_alat'];
	$w_pemeliharaan = $_POST['w_pemeliharaan'];
	$tipe = $_POST['tipe'];
	$merek = $_POST['merek'];
	// $tgl_lahir = $_POST['tgl_lahir'];
	$tgl_beli=date('Y-m-d',strtotime($_POST['tgl_beli']));
	$query = "UPDATE alat SET no_seri='$no_seri', nm_alat='$nm_alat', tgl_beli='$tgl_beli', w_pemeliharaan='$w_pemeliharaan', tipe='$tipe', merek='$merek'
				WHERE no_seri='$no_serilama'";

	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	
	header('location:../page/alat/alat.php?info=Berhasil di ubah');
}
?>