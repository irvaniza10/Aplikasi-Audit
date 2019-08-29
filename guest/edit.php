<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Audit</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_audit=mysqli_real_escape_string($con, $_GET['audit_id']);
$det=mysqli_query($con, "select * from audit where audit_id='$id_audit'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="audit_id" value="<?php echo $d['audit_id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Audit</td>
				<td><input type="text" class="form-control" name="audit_name" value="<?php echo $d['audit_name'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Client</td>
				<td><input type="text" class="form-control" name="company" value="<?php echo $d['company'] ?>"></td>
			</tr>
			<!-- <tr>
				<td>Tahun</td>
				<td><input type="text" class="form-control" name="year" value="<?php echo $d['year'] ?>"></td>
			</tr>
			<tr>
				<td>Path File</td>
				<td><input type="text" class="form-control" name="path" value="<?php echo $d['path'] ?>"></td>
			</tr> -->
			<!-- <tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
			</tr> -->
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>