<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

 public function __construct() {
  parent::__construct();
  if (!isset($this->session->userdata['id_user'])) {
  redirect(base_url("Login"));
  }
 }

	public function index()
	{
		$data['totalmawar']= $this->dataanggota_model->totalmawar();
		$data['totalmelati']= $this->dataanggota_model->totalmelati();
		$data['totalartikel']= $this->dataartikel_model->totalartikel();
		$data['totaluser']= $this->datauser_model->totaluser();
		$data['totalapproval']= $this->dataanggota_model->totalapproval();
		$data['anggotaterbaru']= $this->dataanggota_model->anggotaterbaru();
		$data['totalanggotaterbaru']= $this->dataanggota_model->totalanggotaterbaru();
    $data['namauser'] = $this->datauser_model->nama_user();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain',$data);
		$this->load->view('admin/asidebar',$data);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer');
	}

public function anggota()
	{
		$data['anggota'] = $this->dataanggota_model->tampilanggota();
      	$data['namauser'] = $this->datauser_model->nama_user();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain',$data);
		$this->load->view('admin/asidebar',$data);
		$this->load->view('admin/anggota',$data);
		$this->load->view('admin/footer');
	}

public function approve()
	{
    $data['approve'] = $this->dataanggota_model->approve();
      $data['namauser'] = $this->datauser_model->nama_user();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain',$data);
		$this->load->view('admin/asidebar',$data);
		$this->load->view('admin/approve',$data);
		$this->load->view('admin/footer');
	}

public function user()
	{
		$id = $this->session->userdata('id');
		$data['user'] = $this->datauser_model->tampiluser($id);
        $data['namauser'] = $this->datauser_model->nama_user();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain',$data);
		$this->load->view('admin/asidebar',$data);
		$this->load->view('admin/user',$data);
		$this->load->view('admin/footer');
	}

public function ubahpassword()
	{
      $data['namauser'] = $this->datauser_model->nama_user();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain',$data);
		$this->load->view('admin/asidebar',$data);
		$this->load->view('admin/ubahpassword');
		$this->load->view('admin/footer');
	}

public function artikel()
	{
    	$data['artikel'] = $this->dataartikel_model->tampilartikel();
      	$data['namauser'] = $this->datauser_model->nama_user();
      	$data['kategori'] = $this->dataartikel_model->tampilkategori();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain',$data);
		$this->load->view('admin/asidebar',$data);
		$this->load->view('admin/artikel',$data);
		$this->load->view('admin/footer');
	}

public function kategoriartikel()
	{
		$data['artikel'] = $this->dataartikel_model->tampilartikel();
      	$data['namauser'] = $this->datauser_model->nama_user();
      	$data['kategori'] = $this->dataartikel_model->tampilkategori();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain',$data);
		$this->load->view('admin/asidebar',$data);
		$this->load->view('admin/kategoriartikel',$data);
		$this->load->view('admin/footer');
	}

public function laporan()
	{
		$data['anggota'] = $this->dataanggota_model->tampilanggota();
      	$data['namauser'] = $this->datauser_model->nama_user();
		$this->load->view('admin/header');
		$this->load->view('admin/headermain',$data);
		$this->load->view('admin/asidebar',$data);
		$this->load->view('admin/detaillaporan',$data);
		$this->load->view('admin/footer');
	}
public function export(){
    // Load plugin PHPExcel nya
     include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('Jakarta Center Management')
                 ->setLastModifiedBy('Jakarta Center Management')
                 ->setTitle("Anggota JCM (Mawar)")
                 ->setSubject("Anggota JCM (Mawar)")
                 ->setDescription("Laporan Data Anggota JCM (Mawar)")
                 ->setKeywords("Data Anggota JCM (Mawar)");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
      	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA ANGGOTA JCM (Mawar)"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID ANGGOTA"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "USIA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "TEMPAT LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "TANGGAL LAHIR");
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "NO. HP");
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "DOMISILI");
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "TB");
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "BB");
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "STATUS");
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "GRADE");
    $excel->setActiveSheetIndex(0)->setCellValue('M3', "INSENTIF");
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->dataanggota_model->tampilanggotamawar();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_anggota);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->usia);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tempat_lahir);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tgl_lahir);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->no_telp);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->kota_domisili);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->tinggi_badan);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->berat_badan);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->status);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->grade);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->insentif);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(7); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(19); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(21);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(19);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(6);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(6);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(17);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(11);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Data Anggota JCM (Mawar)");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Anggota JCM (Mawar).xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

public function exportmelati(){
    // Load plugin PHPExcel nya
     include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('Jakarta Center Management')
                 ->setLastModifiedBy('Jakarta Center Management')
                 ->setTitle("Anggota JCM (Melati)")
                 ->setSubject("Anggota JCM (Melati)")
                 ->setDescription("Laporan Data Anggota JCM (Melati)")
                 ->setKeywords("Data Anggota JCM (Melati)");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
      	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA ANGGOTA JCM (Melati)"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID ANGGOTA"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "USIA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "TEMPAT LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "TANGGAL LAHIR");
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "NO. HP");
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "DOMISILI");
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "TB");
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "BB");
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "STATUS");
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "GRADE");
    $excel->setActiveSheetIndex(0)->setCellValue('M3', "INSENTIF");
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->dataanggota_model->tampilanggotamelati();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_anggota);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->usia);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tempat_lahir);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tgl_lahir);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->no_telp);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->kota_domisili);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->tinggi_badan);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->berat_badan);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->status);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->grade);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->insentif);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(7); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(19); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(21);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(19);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(6);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(6);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(17);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(11);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Data Anggota JCM (Melati)");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Anggota JCM (Melati).xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

 function logout(){
  $this->session->sess_destroy();
  redirect(base_url('Login'));
 }
}



/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
