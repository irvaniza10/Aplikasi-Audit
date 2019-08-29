<?php 
if(!isset($_SESSION['uname'])){
	header("location:../index.php");
}
if($_SESSION['uname']!="admin"){
    header("location:../guest/index.php?pesan=salah");
}
?>