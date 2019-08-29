<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pegawai</h3>
<a class="btn" href="pegawai.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_staff=mysqli_real_escape_string($con, $_GET['staff_id']);
$det=mysqli_query($con, "select * from staffdata where staff_id='$id_staff'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update_pegawai.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="staff_id" value="<?php echo $d['staff_id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input type="text" class="form-control" name="no_hp" value="<?php echo $d['no_hp'] ?>"></td>
			</tr>
			<tr>
				<td>Pendidikan Terakhir</td>
				<td><input type="text" class="form-control" name="pendidikan" value="<?php echo $d['pendidikan'] ?>"></td>
			</tr>
			<tr>
				<td>Pengalaman Kerja Terakhir</td>
				<td><input type="text" class="form-control" name="pengalaman" value="<?php echo $d['pengalaman'] ?>"></td>
			</tr>
			<tr>
				<td>Sertifikasi</td>
				<td><input type="text" class="form-control" name="sertifikasi" value="<?php echo $d['sertifikasi'] ?>"></td>
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