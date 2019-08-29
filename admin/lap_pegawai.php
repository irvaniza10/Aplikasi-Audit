<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

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
$pdf->Cell(25.5,0.7,"Laporan Data Pegawai",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Alamat', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'No HP', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Pendidikan', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Pengalaman', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Sertifikasi', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($con, "select * from staffdata");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['alamat'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['no_hp'],1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $lihat['pendidikan'],1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $lihat['pengalaman'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['sertifikasi'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_data_pegawai.pdf","I");

?>