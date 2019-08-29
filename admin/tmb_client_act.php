<?php 
include 'config.php';
$client_id=$_POST['client_id'];
$company_name=$_POST['company_name'];
$no_hp=$_POST['no_hp'];
$status=$_POST['status'];
$email=$_POST['email'];
$alamat=$_POST['alamat'];

// mysqli_query($con,"insert into client values('','$client_name','$company','$year','$modal','$harga','$jumlah','$sisa')");
mysqli_query($con,"insert into clientdata values('','$company_name','$no_hp','$status','$email','$alamat')");

header("location:client.php");

 ?>