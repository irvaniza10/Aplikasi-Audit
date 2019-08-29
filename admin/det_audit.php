<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Audit</h3>
<a class="btn" href="audit.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_audit=mysqli_real_escape_string($con,$_GET['audit_id']);


$det=mysqli_query($con, "select * from audit where audit_id='$id_audit'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama Audit</td>
			<td><?php echo $d['audit_name'] ?></td>
		</tr>
		<tr>
			<td>Nama Client</td>
			<td><?php echo $d['company'] ?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td><?php echo $d['year'] ?></td>
		</tr>
		<tr>
			<td>Path File</td>
			<td><?php echo $d['path'] ?></td>
		</tr>
		<tr>
			<td>Nama File</td>
			<td><?php echo $d['file_name'] ?></td>
		</tr>
		<tr>
			<div class="form-group">
				<label></label>
				<!-- <td><a href="buka.php?audit_id=<?php echo $d['audit_id']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-open"></span>Buka File</a> -->
				<td><a href="<?php echo $d['path'].$d['file_name'] ?>" class="btn btn-info" download=""><span class="glyphicon glyphicon-download-alt"></span>Download</a></td>
				<td></td>
				<!-- <input type="submit" class="btn btn-info" value="Ganti">
				<input type="reset" class="btn btn-danger" value="Reset"> -->
			</div>
			<!-- <td><a href="buka.php?audit_id=<?php echo $d['audit_id']; ?>" class="btn btn-info">Buka File</a></td>
			<td><a href="<?php echo $d['path'].$d['file_name'] ?>" class="btn btn-info" download="">Download</a></td> -->
		</tr>
		
		<!-- <tr>
			<td>Harga</td>
			<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo $d['jumlah'] ?></td>
		</tr> -->
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>