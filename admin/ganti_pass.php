<?php 
include 'header.php';
include 'config.php';
?>

<?php
	$periksa=mysqli_query($con,"select * from clientdata");
	while($q=mysqli_fetch_array($periksa)){	
		if($q['status']=='Pre-Engagement'){	
			?>	
			<script>
				$(document).ready(function(){
					$('#pesan_sedia').css("color","red");
					$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
				});
			</script>
			<?php	
		}
	}
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Password</h3>
<br/><br/>
<?php 
if(isset($_GET['pesan'])){
	$pesan=mysqli_real_escape_string($con, $_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Password gagal di ganti !!     Periksa Kembali Password yang anda masukkan !!</div>";
	}else if($pesan=="tdksama"){
		echo "<div class='alert alert-warning'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}else if($pesan=="oke"){
		echo "<div class='alert alert-success'>Password sukses diganti </div>";
	}
}
?>

<br/>
<div class="col-md-5 col-md-offset-3">
	<form action="ganti_pass_act.php" method="post">
		<div class="form-group">
			<input name="user" type="hidden" value="<?php echo $_SESSION['uname']; ?>">
		</div>
		<div class="form-group">
			<label>Password Lama</label>
			<input name="lama" type="password" class="form-control" placeholder="Password Lama .." required>
		</div>
		<div class="form-group">
			<label>Password Baru</label>
			<input name="baru" id="baru" type="password" class="form-control" placeholder="Password Baru .."required>
		</div>
		<div class="form-group">
			<label>Ulangi Password</label>
			<input name="ulang" type="password" class="form-control" placeholder="Ulangi Password .."required>
		</div>	
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-info" value="Simpan">
			<input type="reset" class="btn btn-danger" value="Reset">
		</div>																	
	</form>
</div>

<script type="text/javascript">
	var input=document.getElementById("psw");
</script>

<?php 
include 'footer.php';

?>