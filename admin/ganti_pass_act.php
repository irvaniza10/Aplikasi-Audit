<?php 
include 'config.php';
$user=$_POST['user'];
//$lama=$_POST['lama'];
$lama=mysqli_real_escape_string($con,md5($_POST['lama']));
$baru=mysqli_real_escape_string($con,$_POST['baru']);
$ulang=mysqli_real_escape_string($con,$_POST['ulang']);

$cek=mysqli_query($con,"select * from userdata where pass='$lama' and uname='$user'");
if(mysqli_num_rows($cek)==1){
	if($baru==$ulang){
		$b = md5($baru);
		mysqli_query($con,"update userdata set pass='$b' where uname='$user'");
		header("location:ganti_pass.php?pesan=oke");
	}else{
		header("location:ganti_pass.php?pesan=tdksama");
	}
}else{
	header("location:ganti_pass.php?pesan=gagal");
}

 ?>