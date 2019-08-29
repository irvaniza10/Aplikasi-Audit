<?php
include 'config.php';
$id_audit=mysqli_real_escape_string($con,$_GET['audit_id']);


$det=mysqli_query($con, "select * from audit where audit_id='$id_audit'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	$auditname=$d['audit_name'];
	$company=$d['company'];
	$year=$d['year'];
	$path=$d['path'];	 
}
chdir ('../');
//echo getcwd();
chdir("admin/".$path);
$command="attrib +r ".$company.".xlsx";
exec($command);
exec($company.'.xlsx');

header("location:det_audit.php?audit_id=$id_audit");
?>