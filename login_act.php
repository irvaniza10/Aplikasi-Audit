<?php 
session_start();
include 'admin/config.php';
$uname=mysqli_real_escape_string($con,$_POST['uname']);
//$pass=$_POST['pass'];
$pass=mysqli_real_escape_string($con,md5($_POST['pass']));
$query=mysqli_query($con, "select * from userdata where uname='$uname' and pass='$pass'");
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
$securimage = new Securimage();

if(mysqli_num_rows($query)==1){
	if ($securimage->check($_POST['captcha_code']) == false) {
		header("location:index.php?pesan=salah");
	}
	else {
	$_SESSION['uname']=$uname;
	if($uname!="admin"){header("location:guest/index.php");}
	else
	header("location:admin/index.php");
	}
}else{
	header("location:index.php?pesan=gagal");
	// mysql_error();
} 
// echo $pas; hacked')*/
 ?>

 
