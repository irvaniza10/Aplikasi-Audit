<?php 
include 'config.php';
$staff_id=$_POST['staff_id'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$pendidikan=$_POST['pendidikan'];
$pengalaman=$_POST['pengalaman'];
$sertifikasi=$_POST['sertifikasi'];

$path="data/pegawai/".$nama."/";
$allowed_extension=array("zip","rar","ZIP","RAR");

$file=$_FILES['file']['name'];
$file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

if(!file_exists($_FILES['file']['tmp_name'])) {
	header("location:audit.php?pesan=filekosong");
}
else if($_FILES['file']['size']>10000000){
	header("location:pegawai.php?pesan=oversize");
}
else if(! in_array($file_extension,$allowed_extension)){
	header("location:pegawai.php?pesan=tidaksesuai");
}

else{
	if(!file_exists("data/pegawai/".$nama."/")){
		// unlink("data/".$year."/".$company.".xlsx");
        // move_uploaded_file($_FILES['file']['tmp_name'], "data/".$year."/".$_FILES['file']['name']);
        mkdir("data/pegawai/".$nama."/",0700);
		//header("location:audit.php?pesan=replace");
	}

	if(file_exists("data/pegawai/".$nama."/".$file)){
		header("location:pegawi.php?pesan=replace");
	}
	else {
    move_uploaded_file($_FILES['file']['tmp_name'], "data/pegawai/".$nama."/".$_FILES['file']['name']);
    header("location:pegawai.php?pesan=oke");
    mysqli_query($con,"insert into staffdata values('','$nama','$alamat','$no_hp','$pendidikan','$pengalaman','$sertifikasi','$path','$file')");
	}
}
//mysqli_query($con,"insert into staffdata values('','$nama','$alamat','$no_hp','$pendidikan','$pengalaman','$sertifikasi')");

//header("location:pegawai.php");
?>