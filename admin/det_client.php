<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Client</h3>
<a class="btn" href="client.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_client=mysqli_real_escape_string($con,$_GET['client_id']);


$det=mysqli_query($con, "select * from clientdata where client_id='$id_client'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama Client</td>
			<td><?php echo $d['company_name'] ?></td>
		</tr>
		<tr>
			<td>No HP</td>
			<td><?php echo $d['no_hp'] ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><?php echo $d['status'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $d['email'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $d['alamat'] ?></td>
		</tr>
		<td></td><td></td>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>