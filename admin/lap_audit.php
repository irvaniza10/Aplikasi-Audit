<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

if(isset($_GET['year'])){
	$tahun=$_GET['year'];
	$judul="Laporan Data Audit Tahun ".$tahun;
	$query=mysqli_query($con, "select * from audit where year='$tahun'");
}
else {
	$judul="Laporan Data Audit";
	$query=mysqli_query($con, "select * from audit");
}

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../logo/ihufirm.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'KAP Irwanto Hary Usman',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Tel. 62 21 82437516 Fax. 62 21 8215338',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Taman Galaxy - Bekasi',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Website : ihufirm.com Email : simkuda_k@yahoo.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"$judul",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Audit', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Client', 1, 1, 'C');
// $pdf->Cell(4.5, 0.8, 'Harga', 1, 0, 'C');
// $pdf->Cell(2, 0.8, 'Jumlah', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
// $query=mysqli_query($con, "select * from audit");
while($lihat=mysqli_fetch_array($query)){
	// $pdf->ln(1);
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['tanggal'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['audit_name'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['company'],1, 1, 'C');
	// $pdf->Cell(4.5, 0.8, $lihat['harga'],1, 0, 'C');
	// $pdf->Cell(2, 0.8, $lihat['jumlah'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_audit.pdf","I");

?>