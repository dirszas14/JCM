<?php 
  require_once '../../assets/PHPExcel/Classes/PHPExcel.php';
  require_once '../../function/koneksi.php';
	
	$tanggalmulai = $_POST['tanggalmulai'];
	$tanggalselesai = $_POST['tanggalselesai']; 	
	$file = new PHPExcel();
	$file->getProperties()->setTitle( "Data Pemeliharaan" );
	
		 
	$file->createSheet ( NULL,0);
	$file->setActiveSheetIndex ( 0 );
	$sheet = $file->getActiveSheet ( 0 );
	$sheet->setTitle ( "Data Pemeliharaan" );
 	
 	$styleArray = array(
      'borders' => array(
          	  'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
          )
      ),
    );


	$styleArray2 = array(
    	'font'  => array(
        		'bold'  => true,
      	),
	);

	$styleArray3 = array(
    	'font'  => array(
        		'bold'  => true,
        		'size'  => 18,
      	),
	);
	$file->getActiveSheet()->getColumnDimension('A')->setWidth(3.55);
 	$file->getActiveSheet()->getColumnDimension('B')->setWidth(3);
 	$file->getActiveSheet()->getColumnDimension('C')->setWidth(11,71);
	$file->getActiveSheet()->getColumnDimension('D')->setWidth(18,43);
	$file->getActiveSheet()->getColumnDimension('E')->setWidth(10.75);
	$file->getActiveSheet()->getColumnDimension('F')->setWidth(15.75);
	$file->getActiveSheet()->getColumnDimension('G')->setWidth(20,29);
	$file->getActiveSheet()->getColumnDimension('H')->setWidth(9,29);
	$file->getActiveSheet()->getColumnDimension('I')->setWidth(16,86);
	$file->getActiveSheet()->getColumnDimension('J')->setWidth(8,57);
	$file->getActiveSheet()->getColumnDimension('K')->setWidth(9,57);
	$file->getActiveSheet()->getColumnDimension('L')->setWidth(11,14);
	$file->getActiveSheet()->getColumnDimension('M')->setWidth(11,90);
	$file->getActiveSheet()->getColumnDimension('N')->setWidth(6,0);
	$file->getActiveSheet()->getColumnDimension('O')->setWidth(17);
	$file->getActiveSheet()->getColumnDimension('P')->setWidth(10,29);


	$sheet->setCellValue("B5","No")
		  ->setCellValue("C5","Kode Hasil")
		  ->setCellValue("D5","Jenis Pemeliharaan")
		  ->setCellValue("E5","Keterangan")
		  ->setCellValue("F5","Kode Jadwal")
		  ->setCellValue("G5","Tanggal Pemeliharaan")
		  ->setCellValue("H5","No. Seri")
		  ->setCellValue("I5","Nama Alat")
		  ->setCellValue("J5","Tipe Alat")
		  ->setCellValue("K5","Merek")
		  ->setCellValue("L5","Kode Lokasi")
		  ->setCellValue("M5","Nama Lokasi")
		  ->setCellValue("N5","Lantai")
		  ->setCellValue("O5","Kode Pemeliharaan")
		  ->setCellValue("P5","Pelaksana");

			 
	$sql = "SELECT hsl_pemeliharaan.kd_hasil, hsl_pemeliharaan.j_pemeliharaan, hsl_pemeliharaan.keterangan,
            jadwal.kd_jadwal, jadwal.tgl_pemeliharaan, alat.no_seri, alat.nm_alat, alat.tipe, alat.merek, 
            lokasi_alat.kd_lokalat, lokasi_alat.nm_lokasi, lokasi_alat.lantai, pemeliharaan.kd_pemeliharaan, pemeliharaan.nip, user.nip, user.nama
            FROM hsl_pemeliharaan
            INNER JOIN user ON hsl_pemeliharaan.nip = user.nip
            INNER JOIN jadwal ON hsl_pemeliharaan.kd_jadwal = jadwal.kd_jadwal
            INNER JOIN alat ON hsl_pemeliharaan.no_seri = alat.no_seri
            INNER JOIN lokasi_alat ON hsl_pemeliharaan.kd_lokalat = lokasi_alat.kd_lokalat
            INNER JOIN pemeliharaan ON hsl_pemeliharaan.kd_pemeliharaan = pemeliharaan.kd_pemeliharaan
            WHERE date(tgl_pemeliharaan) >= '$tanggalmulai' AND date(tgl_pemeliharaan) <= '$tanggalselesai' "; 
	$result=mysqli_query($koneksi,$sql);
	$nourut = 1;
	$nomor=5;
	$rowresult = mysqli_num_rows($result)+5;


	$file->setActiveSheetIndex(0)->mergeCells('B2:P3');
	$sheet->setCellValue("B2","Laporan Data Pemeliharaan");
	$file->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	

	$file->getActiveSheet()->getStyle("B2")->applyFromArray($styleArray3);
	$file->getActiveSheet()->getStyle("B5:P".$rowresult)->applyFromArray($styleArray);
	$file->getActiveSheet()->getStyle("B5:P5")->applyFromArray($styleArray2);
    $file->getActiveSheet()->getStyle("B5:P".$rowresult)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	while($row=mysqli_fetch_array($result)){
		$nomor++;
		$sheet->setCellValue ( "B".$nomor, $nourut++ )
			  ->setCellValue ( "C".$nomor, $row["kd_hasil"])
			  ->setCellValue ( "D".$nomor, $row["j_pemeliharaan"])
			  ->setCellValue ( "E".$nomor, $row["keterangan"] )
			  ->setCellValue ( "F".$nomor, $row["kd_jadwal"])
			  ->setCellValue ( "G".$nomor, $row['tgl_pemeliharaan'])
			  ->setCellValue ( "H".$nomor, $row['no_seri'])
			  ->setCellValue ( "I".$nomor, $row['nm_alat'])
			  ->setCellValue ( "J".$nomor, $row['tipe'])
			  ->setCellValue ( "K".$nomor, $row['merek'])
			  ->setCellValue ( "L".$nomor, $row['kd_lokalat'] )
			  ->setCellValue ( "M".$nomor, $row['nm_lokasi'] )
			  ->setCellValue ( "N".$nomor, $row['lantai'] )
			  ->setCellValue ( "O".$nomor, $row['kd_pemeliharaan'] )
			  ->setCellValue ( "P".$nomor, $row['nama'] );
			  
	}
		 
	header ( 'Content-Type: application/vnd.ms-excel' );
	//namanya adalah keluarga.xls
	header ( 'Content-Disposition: attachment;filename="Report.xls"' ); 
	header ( 'Cache-Control: max-age=0' );
	$writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
	$writer->save ( 'php://output' );
		
?>