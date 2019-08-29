<?php 
include 'config.php';
//$id=$_GET['audit_id'];
$id_client=mysqli_real_escape_string($con,$_GET['client_id']);


$det=mysqli_query($con, "select * from clientdata where client_id='$id_client'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	$company_name=$d['company_name'];
	$email=$d['email'];
	$status=$d['status'];	 
}
mysqli_query($con, "delete from clientdata where client_id='$id_client'");
header("location:client.php");

?>