<?php 
include 'config.php';
//$id=$_GET['audit_id'];
$id_audit=mysqli_real_escape_string($con,$_GET['audit_id']);


$det=mysqli_query($con, "select * from audit where audit_id='$id_audit'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	$path=$d['path'];
	$file_name=$d['file_name'];	 
}
mysqli_query($con, "delete from audit where audit_id='$id_audit'");
unlink($path.$file_name);
//rmdir($path);
//unlink("data/audit/".$year."/".$company.".xlsx");
header("location:audit.php");

?>