<?php 
include 'config.php';
$client_id=$_POST['client_id'];
$company_name=$_POST['company_name'];
$no_hp=$_POST['no_hp'];
$status=$_POST['status'];
$email=$_POST['email'];
$alamat=$_POST['alamat'];
// $year=$_POST['year'];
// $path=$_POST['path'];
//$modal=$_POST['modal'];
// $harga=$_POST['harga'];
// $jumlah=$_POST['jumlah'];

mysqli_query($con,"update clientdata set company_name='$company_name', no_hp='$no_hp', status='$status', email='$email', alamat='$alamat' where client_id='$client_id'");
header("location:client.php");

?>