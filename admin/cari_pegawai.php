<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	if($cari==NULL) {
		header("location:pegawai.php?cari=kosong");	
	}
	else {
		header("location:pegawai.php?cari=$cari");
	}				
}
?>