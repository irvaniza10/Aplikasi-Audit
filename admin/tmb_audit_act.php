<?php 
include 'config.php';
$audit_id=$_POST['audit_id'];
$audit_name=$_POST['audit_name'];
$company=$_POST['company'];
$tgl=$_POST['tgl'];
$parts = explode('/', $tgl);
$year = $parts[0];
//$year=$_POST['year'];
//$path=$_POST['path'];
$path="data/audit/".$year."/".$company."/";
//$file_name="$company".".xlsx";
$allowed_extension=array("xlsx","pdf","zip","rar","XLSX","PDF","ZIP","RAR");
//$allowed_extension="xlsx";

$file=$_FILES['file']['name'];
$file_name=$file;
$file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

if(!file_exists($_FILES['file']['tmp_name'])) {
	header("location:audit.php?pesan=filekosong");
}
else if($_FILES['file']['size']>10000000){
	header("location:audit.php?pesan=oversize");
}
else if(! in_array($file_extension,$allowed_extension)){
	header("location:audit.php?pesan=tidaksesuai");
}
// else if($file!=$file_name){
// 	header("location:audit.php?pesan=tidaksama");
// }
/* move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name'])or die();
// 	mysql_query("update admin set foto='$foto' where uname='$user'");*/

/*$u=mysql_query("select * from admin where uname='$user'");
$us=mysql_fetch_array($u);*/
else{
	if(!file_exists("data/audit/".$year."/")){
		// unlink("data/".$year."/".$company.".xlsx");
        // move_uploaded_file($_FILES['file']['tmp_name'], "data/".$year."/".$_FILES['file']['name']);
        mkdir("data/audit/".$year."/",0700);
		//header("location:audit.php?pesan=replace");
	}
	if(!file_exists("data/audit/".$year."/".$company."/")){
		// unlink("data/".$year."/".$company.".xlsx");
        // move_uploaded_file($_FILES['file']['tmp_name'], "data/".$year."/".$_FILES['file']['name']);
        mkdir("data/audit/".$year."/".$company."/",0700);
		//header("location:audit.php?pesan=replace");
	}
	if(file_exists("data/audit/".$year."/".$file)){
		// unlink("data/".$year."/".$company.".xlsx");
		// move_uploaded_file($_FILES['file']['tmp_name'], "data/".$year."/".$_FILES['file']['name']);
		header("location:audit.php?pesan=replace");
	}
	else {
	move_uploaded_file($_FILES['file']['tmp_name'], "data/audit/".$year."/".$company."/".$_FILES['file']['name']);
	mysqli_query($con,"insert into audit values('','$tgl','$audit_name','$company','$year','$path','$file_name')");
	header("location:audit.php?pesan=oke");
	}

}
// if(file_exists("data/".$year."/".$company.".xlsx")){
// 	unlink("data/".$year."/".$company.".xlsx");
// 	move_uploaded_file($_FILES['file']['tmp_name'], "data/".$year."/".$_FILES['file']['name']);
// 	// mysqli_query($con,"update audit set path='$path' where company='$company'");
// 	// //mysql_query("update admin set foto='$foto' where uname='$user'");
// 	header("location:audit.php?pesan=replace");
// }else{
// 	move_uploaded_file($_FILES['file']['tmp_name'], "data/".$year."/".$_FILES['file']['name']);
// 	// mysqli_query($con,"update audit set path='$path' where company='$company'");
// 	// //mysql_query("update admin set foto='$foto' where uname='$user'");
// 	header("location:audit.php?pesan=oke");
// }

// mysqli_query($con,"insert into audit values('','$audit_name','$company','$year','$modal','$harga','$jumlah','$sisa')");

//header("location:audit.php");
?>