<?php 
// $cari=$_GET['cari'];
// if($cari==" ") {
// 	header("location:audit.php?cari=kosong");	
// }
// else {
// header("location:audit.php?cari=$cari");
// }
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	if($cari==NULL) {
		header("location:audit.php?cari=kosong");	
	}
	else {
		header("location:audit.php?cari=$cari");
	}				
}
/*include 'config.php';
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($con,"select * from barang where nama like '%".$cari."%'");				
	}else{
		$data = mysqli_query($con,"select * from barang");		
	}
	$no = 1;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['nama']; ?></td>
	</tr>
	<?php } ?>*/
	?>