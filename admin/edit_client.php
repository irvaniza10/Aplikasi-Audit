<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit client</h3>
<a class="btn" href="client.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_client=mysqli_real_escape_string($con, $_GET['client_id']);
$det=mysqli_query($con, "select * from clientdata where client_id='$id_client'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update_client.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="client_id" value="<?php echo $d['client_id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Client</td>
				<td><input type="text" class="form-control" name="company_name" value="<?php echo $d['company_name'] ?>"></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input type="text" class="form-control" name="no_hp" value="<?php echo $d['no_hp'] ?>"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select class="form-control" name="status">
						<option value="Pre-Engagement">Pre-Engagement</option>
						<option value="Risk Assesment">Risk Assesment</option>
						<option value="Risk Response">Risk Response</option>
						<option value="Reporting">Reporting</option>
						<option value="Complete">Complete</option>
				</select></td>
				<!-- <td><input type="text" class="form-control" name="status" value="<?php echo $d['status'] ?>"></td> -->
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" class="form-control" name="email" value="<?php echo $d['email'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
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