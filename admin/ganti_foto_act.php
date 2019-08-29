<?php 
include 'config.php';
$user=$_POST['user'];
$foto=$_FILES['foto']['name'];
$allowed_extension=array("png","jpg","jpeg","PNG","JPG","JPEG");

$file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

if(!file_exists($_FILES['foto']['tmp_name'])) {
	header("location:ganti_foto.php?pesan=filekosong");
}
else if($_FILES['file']['size']>2000000){
	header("location:ganti_foto.php?pesan=oversize");
}
else if(! in_array($file_extension,$allowed_extension)){
	header("location:ganti_foto.php?pesan=tidaksesuai");
}
/* move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name'])or die();
// 	mysql_query("update admin set foto='$foto' where uname='$user'");*/

/*$u=mysql_query("select * from admin where uname='$user'");
$us=mysql_fetch_array($u);*/
else {
	$u=mysqli_query($con,"select * from userdata where uname='$user'");
	$us=mysqli_fetch_array($u);
	if(file_exists("foto/".$us['foto'])){
		unlink("foto/".$us['foto']);
		move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
		mysqli_query($con,"update userdata set foto='$foto' where uname='$user'");
		//mysql_query("update admin set foto='$foto' where uname='$user'");
		header("location:ganti_foto.php?pesan=oke");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
		mysqli_query($con,"update userdata set foto='$foto' where uname='$user'");
		//mysql_query("update admin set foto='$foto' where uname='$user'");
		header("location:ganti_foto.php?pesan=oke");
	}
}
?>
