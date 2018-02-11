<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['intruksipemeliharaan'])) 
{
	$kd_pemeliharaan = $_POST['kd_pemeliharaan'];
	$nip = $_POST['nip'];
	$kd_jadwal = $_POST['kd_jadwal'];
	$no_seri = $_POST['no_seri'];
	$kd_lokalat = $_POST['kd_lokalat'];
	$kd_fix = date('Ymd')."-".$kd_pemeliharaan;
	$query = "INSERT INTO pemeliharaan (kd_pemeliharaan, nip, kd_jadwal, no_seri, kd_lokalat) VALUES
			('$kd_fix','$nip', '$kd_jadwal','$no_seri','$kd_lokalat')";

	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	header('location:../page/pemeliharaan/pemeliharaan.php?info=Berhasil di tambah');
}

elseif (isset($_POST['updatepemeliharaan'])) 
{
	$kd_pemeliharaan = $_POST['kd_pemeliharaan'];
	$status = 'Diambil';

	$query = "UPDATE pemeliharaan SET status='$status' WHERE kd_pemeliharaan='$kd_pemeliharaan'";

	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	header('location:../page/pemeliharaan/pemeliharaan.php?info=Berhasil diambil');
}

elseif (isset($_POST['ubahintruksi'])) 
{
	$kd_pemeliharaan = $_POST['kd_pemeliharaan'];
	$nip = $_POST['nip'];
	$kd_jadwal = $_POST['kd_jadwal'];
	$no_seri = $_POST['no_seri'];
	$kd_lokalat = $_POST['kd_lokalat'];

	$query = "UPDATE pemeliharaan SET nip='$nip', kd_jadwal='$kd_jadwal', no_seri='$no_seri', kd_lokalat='$kd_lokalat' WHERE kd_pemeliharaan='$kd_pemeliharaan'";

	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	header('location:../page/pemeliharaan/pemeliharaan.php?info=Berhasil diambil');
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

elseif(isset($_POST['hapusintruksi']))
{
	$kd_pemeliharaan=$_POST['kd_pemeliharaan'];

	$query="DELETE FROM pemeliharaan WHERE kd_pemeliharaan='$kd_pemeliharaan'";
	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	
	header('location:../page/pemeliharaan/pemeliharaan.php?info=Berhasil di hapus');
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

	$result=mysqli_query($koneksi,$query)
	or die(mysqli_error($koneksi));
	header('location:../page/alat/alat.php?info=Berhasil di ubah');
}

elseif (isset($_POST['validasi'])) 
{
	$kd_hasil = $_POST['kd_hasil'];
	$keterangan = 'Tervalidasi';

	$query = "UPDATE hsl_pemeliharaan SET keterangan='$keterangan' WHERE kd_hasil='$kd_hasil'";

	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	header('location:../page/pemeliharaan/validasihasil.php?info=Berhasil diambil');
}

?>