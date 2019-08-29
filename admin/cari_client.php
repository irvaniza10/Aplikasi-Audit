<?php 
// $cari=$_GET['cari'];
// header("location:client.php?cari=$cari");

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	if($cari==NULL) {
		header("location:client.php?cari=kosong");	
	}
	else {
		header("location:client.php?cari=$cari");
	}				
}
?>