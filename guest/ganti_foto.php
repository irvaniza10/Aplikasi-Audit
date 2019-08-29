<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</h3>
<br/><br/>
<?php 
if(isset($_GET['pesan'])){
	$pesan=mysqli_real_escape_string($con, $_GET['pesan']);
	if($pesan=="oke"){
		echo "<div class='alert alert-success'>Foto berhasil di ganti !! </div>";
	}
	else if($pesan=="filekosong"){
		echo "<div class='alert alert-danger'>Foto belum dimasukkan !! </div>";
	}
	else if($pesan=="oversize"){
		echo "<div class='alert alert-warning'>Ukuran foto tidak boleh melebihi 2MB !! </div>";
	}
	else if($pesan=="tidaksesuai"){
		echo "<div class='alert alert-danger'>Foto hanya boleh ekstensi .png, .jpg, dan .jpeg </div>";
	}
}
?>

<br/>
<div class="col-md-5 col-md-offset-3">
	<form action="ganti_foto_act.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<input name="user" type="hidden" value="<?php echo $_SESSION['uname']; ?>">
		</div>
		<div class="form-group">
			<label>Foto</label>
			<input name="foto" type="file" class="form-control" placeholder="Password Lama ..">
		</div>		
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-info" value="Ganti">
			<input type="reset" class="btn btn-danger" value="Reset">
		</div>																	
	</form>
</div>

<?php 
include 'footer.php';

?>