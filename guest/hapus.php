<?php 
include 'config.php';
//$id=$_GET['audit_id'];
$id_audit=mysqli_real_escape_string($con,$_GET['audit_id']);


$det=mysqli_query($con, "select * from audit where audit_id='$id_audit'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	$auditname=$d['audit_name'];
	$company=$d['company'];
	$year=$d['year'];
	$path=$d['path'];	 
}
mysqli_query($con, "delete from audit where audit_id='$id_audit'");
unlink("data/".$year."/".$company.".xlsx");
header("location:barang.php");

?>