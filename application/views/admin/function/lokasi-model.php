<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['tambahlokasi'])) 
{
	$kd_lokalat = $_POST['kd_lokalat'];
	$nm_lokasi = $_POST['nm_lokasi'];
	$lantai = $_POST['lantai'];
	// $tgl_lahir = $_POST['tgl_lahir'];
	$query = "INSERT INTO lokasi_alat (kd_lokalat, nm_lokasi, lantai) VALUES
			('$kd_lokalat','$nm_lokasi','$lantai')";

	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	header('location:../page/alat/lokasi.php?info=Berhasil di tambah');
}

elseif(isset($_POST['hapuslokasi']))
{
	$kd_lokalat=$_POST['kd_lokalat'];

	$query="DELETE FROM lokasi_alat WHERE kd_lokalat='$kd_lokalat'";
	$result=mysqli_query($koneksi,$query);
	if ($result===TRUE)
	{
	header('location:../page/alat/lokasi.php?info=Berhasil di hapus');
	}

}

elseif (isset($_POST['editlokasi'])) 
{
	$kd_lokalat =$_POST['kd_lokalat'];
	$kd_lokasilama =$_POST['kd_lokasilama'];
	$nm_lokasi = $_POST['nm_lokasi'];
	$lantai = $_POST['lantai'];
	// $tgl_lahir = $_POST['tgl_lahir'];
	$query = "UPDATE lokasi_alat SET kd_lokalat='$kd_lokalat', nm_lokasi='$nm_lokasi', lantai='$lantai'
				WHERE kd_lokalat='$kd_lokasilama'";

	$result=mysqli_query($koneksi,$query)
	or die(mysqli_error($koneksi));
	header('location:../page/alat/lokasi.php?info=Berhasil di ubah');
}
?>