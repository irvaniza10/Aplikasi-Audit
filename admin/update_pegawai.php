<?php 
include 'config.php';
$staff_id=$_POST['staff_id'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$pendidikan=$_POST['pendidikan'];
$pengalaman=$_POST['pengalaman'];
$sertifikasi=$_POST['sertifikasi'];

mysqli_query($con,"update staffdata set nama='$nama', alamat='$alamat', no_hp='$no_hp' , pendidikan='$pendidikan', pengalaman='$pengalaman', sertifikasi='$sertifikasi' where staff_id='$staff_id'");
header("location:pegawai.php");

?>