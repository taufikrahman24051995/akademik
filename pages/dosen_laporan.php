<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location:login.php");
    exit;
};
 
require 'functions.php';

$dosen = query("SELECT * FROM dosen ORDER BY Nip ASC");

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
$pdf->Cell(19,0.7,"Data Dosen",0,10,'C');
$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);

//Tidak berpengaruh dengan database hanya sebagai keterangan pada tabel nantinya
$pdf->Cell(2, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'NIP', 1, 0, 'C');
$pdf->Cell(10, 0.8, 'Nama Dosen', 1, 0, 'C');

$pdf->ln(0.8);
$pdf->SetFont('Arial','',10);
$no=1;

foreach ($dosen as $lihat) {

 $pdf->Cell(2, 0.8, $no, 1, 0, 'C');
 $pdf->Cell(7, 0.8, $lihat['Nip'], 1, 0,'C');
 $pdf->Cell(10, 0.8, $lihat['Nama_Dosen'], 1, 0,'C');

 $no++;
 $pdf->ln(0.8);
}

$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(30,0.7,"Author",0,10,'C');

$pdf->ln(1);

//Nama file ketika di print
$pdf->Output("laporan_dosen.pdf","I");

?>