<?php 
include 'config.php';
//$id=$_GET['audit_id'];
$id_staff=mysqli_real_escape_string($con,$_GET['staff_id']);

$det=mysqli_query($con, "select * from staffdata where staff_id='$id_staff'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
    $path=$d['path'];
	$file_name=$d['file_name'];	 
}

mysqli_query($con, "delete from staffdata where staff_id='$id_staff'");
unlink($path.$file_name);
rmdir($path);
header("location:pegawai.php");

?>