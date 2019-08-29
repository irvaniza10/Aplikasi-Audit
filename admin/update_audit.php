<?php 
include 'config.php';
$audit_id=$_POST['audit_id'];
$audit_name=$_POST['audit_name'];
$company=$_POST['company'];
// $year=$_POST['year'];
// $path=$_POST['path'];
//$modal=$_POST['modal'];
// $harga=$_POST['harga'];
// $jumlah=$_POST['jumlah'];

mysqli_query($con,"update audit set audit_name='$audit_name', company='$company' where audit_id='$audit_id'");
header("location:audit.php");

?>