<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['entryhasil'])) 
{
	$kd_hasil = $_POST['kd_hasil'];
	$j_pemeliharaan = $_POST['j_pemeliharaan'];
	$kd_jadwal = $_POST['kd_jadwal'];
	$nip = $_POST['nip'];
	$no_seri = $_POST['no_seri'];
	$status = 'Maintenance' ;
	$kd_lokalat = $_POST['kd_lokalat'];
	$kd_fix = date('Ymd')."-".$kd_hasil;
	$kd_pemeliharaan = $_POST['kd_pemeliharaan'];
	$query = "INSERT INTO hsl_pemeliharaan (kd_hasil, j_pemeliharaan, kd_jadwal, no_seri, kd_lokalat, kd_pemeliharaan, nip) VALUES
			('$kd_fix','$j_pemeliharaan', '$kd_jadwal','$no_seri','$kd_lokalat', '$kd_pemeliharaan', '$nip')";
	$query_m = "UPDATE pemeliharaan SET status='$status' WHERE kd_pemeliharaan='$kd_pemeliharaan'" ;
	$result=mysqli_query($koneksi,$query);
	$result_m = mysqli_query($koneksi,$query_m);
	header('location:../page/pemeliharaan/hasilpemeliharaan.php?info=Berhasil ditambah');
}

elseif(isset($_POST['hapushasil']))
{
	$kd_hasil=$_POST['kd_hasil'];

	$query="DELETE FROM hsl_pemeliharaan WHERE kd_hasil='$kd_hasil'";
	$result=mysqli_query($koneksi,$query);
	if ($result===TRUE)
	{
	header('location:../page/pemeliharaan/hasilpemeliharaan.php?info=Berhasil di hapus');
	}

}

elseif (isset($_POST['ubahhasil'])) 
{
	$kd_hasil = $_POST['kd_hasil'];
	$j_pemeliharaan = $_POST['j_pemeliharaan'];
	$kd_jadwal = $_POST['kd_jadwal'];
	$nip = $_POST['nip'];
	$no_seri = $_POST['no_seri'];
	$status = 'Maintenance' ;
	$kd_lokalat = $_POST['kd_lokalat'];
	$kd_pemeliharaan = $_POST['kd_pemeliharaan'];
	$query = "UPDATE hsl_pemeliharaan SET kd_hasil='$kd_hasil', j_pemeliharaan='$j_pemeliharaan', kd_jadwal='$kd_jadwal', nip='$nip', no_seri='$no_seri', kd_lokalat='$kd_lokalat', kd_pemeliharaan='$kd_pemeliharaan'
				WHERE kd_hasil='$kd_hasil'";

	$result=mysqli_query($koneksi,$query)
	or die(mysqli_error($koneksi));
	header('location:../page/pemeliharaan/hasilpemeliharaan.php?info=Berhasil di ubah');
}
?>