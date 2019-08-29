<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Pegawai</h3>
<a class="btn" href="pegawai.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_staff=mysqli_real_escape_string($con,$_GET['staff_id']);


$det=mysqli_query($con, "select * from staffdata where staff_id='$id_staff'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $d['alamat'] ?></td>
		</tr>
		<tr>
			<td>No HP</td>
			<td><?php echo $d['no_hp'] ?></td>
		</tr>
		<tr>
			<td>Pendidikan Terakhir</td>
			<td><?php echo $d['pendidikan'] ?></td>
		</tr>
		<tr>
			<td>Pengalaman Kerja Terakhir</td>
			<td><?php echo $d['pengalaman'] ?></td>
		</tr>
		<tr>
			<td>Sertifikasi</td>
			<td><?php echo $d['sertifikasi'] ?></td>
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
				<td><a href="<?php echo $d['path'].$d['file_name'] ?>" class="btn btn-info" download=""><span class="glyphicon glyphicon-download-alt"></span>Download</a></td>
				<td></td>
			</div>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>