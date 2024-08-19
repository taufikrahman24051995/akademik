<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location:login.php");
    exit;
};
 
require 'functions.php';

$perkuliahan = query("SELECT * FROM perkuliahan INNER JOIN mahasiswa ON perkuliahan.Nim = mahasiswa.Nim INNER JOIN matakuliah ON perkuliahan.Kode_MK = matakuliah.Kode_MK INNER JOIN dosen ON perkuliahan.Nip = dosen.Nip");

//Memanggil file FPDF dari file yang anda download tadi
require('../fpdf/fpdf.php');

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(1,0.5,1);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Line(1,3.3,20,3.3);
$pdf->Line(1,3.4,20,3.4);

$pdf->SetFont('Times','B',11);
$pdf->ln(1);
$pdf->SetFont('Arial','B',30);
$pdf->Cell(19,0.7,"Data Perkuliahan",0,10,'C');
$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);

//Tidak berpengaruh dengan database hanya sebagai keterangan pada tabel nantinya
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Mahasiswa', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Mata Kuliah', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Dosen', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nilai', 1, 0, 'C');

$pdf->ln(0.8);
$pdf->SetFont('Arial','',10);
$no=1;

foreach ($perkuliahan as $lihat) {

$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
$pdf->Cell(5, 0.8, $lihat['Nama_Mhs'], 1, 0,'C');
$pdf->Cell(5, 0.8, $lihat['Nama_MK'], 1, 0,'C');
$pdf->Cell(5, 0.8, $lihat['Nama_Dosen'], 1, 0,'C');
$pdf->Cell(3, 0.8, $lihat['Nilai'], 1, 0,'C');

$no++;
$pdf->ln(0.8);
}

$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(30,0.7,"Author",0,10,'C');

$pdf->ln(1);

//Nama file ketika di print
$pdf->Output("laporan_perkuliahan.pdf","I");

?>