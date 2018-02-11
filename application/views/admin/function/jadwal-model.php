<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['penjadwalan'])) 
{
	$tgl_pemeliharaan = $_POST['tgl_pemeliharaan'];
		// $time = strtotime($tgl_pemeliharaan);
	 //    $newformat = date('Ymd',$time);
	 //          $carikode = mysqli_query($koneksi, "select max(kd_jadwal) from jadwal") or die (mysql_error());
	 //          // menjadikannya array
	 //          $datakode = mysqli_fetch_array($carikode);
	 //          // jika $datakode
	 //          if ($datakode) {
	 //           $nilaikode = substr($datakode[0], 1);
	 //           // menjadikan $nilaikode ( int )
	 //           $kode = (int) $nilaikode;
	 //           // setiap $kode di tambah 1
	 //           $kode = $kode + 1;
	 //           $kode_otomatis = "-J".str_pad($kode, 4, "0", STR_PAD_LEFT);
	 //           $otomatis = $kode_otomatis;
	 //          } else {
	 //           $kode_otomatis = "J0001";
	 //           $otomatis = $kode_otomatis;
	 //          }

	$kd_jadwal = $_POST['kd_jadwal'];
	
	$no_seri = $_POST['no_seri'];
	$kd_lokalat = $_POST['kd_lokalat'];
	// $tgl_lahir = $_POST['tgl_lahir'];
	$kd_fix = date('Ymd',strtotime($_POST['tgl_pemeliharaan']))."-".$kd_jadwal;

	$tgl_pemeliharaan=date('Y-m-d',strtotime($_POST['tgl_pemeliharaan']));
	
	$query = "INSERT INTO jadwal (kd_jadwal, tgl_pemeliharaan, no_seri, kd_lokalat) VALUES
			('$kd_fix', '$tgl_pemeliharaan','$no_seri', '$kd_lokalat')";

	$result=mysqli_query($koneksi,$query);
	header('location:../page/jadwal/jadwal.php?info=Berhasil di tambah');
}

elseif(isset($_POST['hapusjadwal']))
{
	$kd_jadwal=$_POST['kd_jadwal'];

	$query="DELETE FROM jadwal WHERE kd_jadwal='$kd_jadwal'";
	$result=mysqli_query($koneksi,$query);
	if ($result===TRUE)
	{
	header('location:../page/jadwal/jadwal.php?info=Berhasil di hapus');
	}

}

elseif (isset($_POST['editjadwal'])) 
{
	$kd_jadwal =$_POST['kd_jadwal'];
	$kd_jadwallama = $_POST['kd_jadwallama'];
	$no_seri = $_POST['no_seri'];
	// $tgl_lahir = $_POST['tgl_lahir'];
	$tgl_pemeliharaan=date('Y-m-d',strtotime($_POST['tgl_pemeliharaan']));
	$query = "UPDATE jadwal SET kd_jadwal='$kd_jadwal', tgl_pemeliharaan='$tgl_pemeliharaan', no_seri='$no_seri'
				WHERE kd_jadwal='$kd_jadwallama'";

	$result=mysqli_query($koneksi,$query)
	or die(mysqli_error($koneksi));
	header('location:../page/jadwal/jadwal.php?info=Berhasil di ubah');
}

elseif (isset($_POST['validasijadwal'])) 
{
	$kd_jadwal = $_POST['kd_jadwal'];
	
	$status = 'Tervalidasi';

	$query = "UPDATE jadwal SET status='Tervalidasi' WHERE kd_jadwal='$kd_jadwal'";

	$result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	header('location:../page/jadwal/validasijadwal.php?info=Berhasil divalidasi');
}
?>