<?php 
include 'header.php';

if(isset($_GET['pesan'])){
	$pesan=mysqli_real_escape_string($con, $_GET['pesan']);
	if($pesan=="salah"){
		echo "<div class='alert alert-danger'>Direct Access tidak diizinkan!!</div>";
	}
}

?>

<div class="col-md-10">
	<h3>Selamat datang</h3>	
    <h3>Aplikasi audit ini merupakan aplikasi yang diharapkan dapat membantu mempermudah staff kantor KAP Irwanto Hary Usman dalam mengelola data audit pada kantor tersebut.</h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>