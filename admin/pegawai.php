<?php include 'header.php'; //echo md5('tamu');?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Pegawai</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Pegawai</button>
<br/>
<br/>

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

<?php 
if(isset($_GET['pesan'])){
	$pesan=mysqli_real_escape_string($con, $_GET['pesan']);
	if($pesan=="oke"){
		echo "<div class='alert alert-success'>File sukses diupload dan Data telah ditambahkan</div>";
	}else if($pesan=="filekosong"){
		echo "<div class='alert alert-danger'>File tidak boleh kosong !!</div>";
	}else if($pesan=="oversize"){
		echo "<div class='alert alert-warning'>File melebihi 10MB !!</div>";
	}else if($pesan=="tidaksesuai"){
		echo "<div class='alert alert-danger'>Ekstensi file harus .xlsx </div>";
	}else if($pesan=="replace"){
		echo "<div class='alert alert-warning'>File telah ada di database !! Hapus terlebih dahulu recordnya !!</div>";
	}
}
?>

<?php 
$halaman = 10;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($con,"select * from staffdata");
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);            
//$query = mysqli_query($con,"select * from barang LIMIT $mulai, $halaman")or die(mysql_error);
$no =$mulai+1;
?>

<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $total; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $pages; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_pegawai.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_pegawai.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari pegawai di sini .." aria-describedby="basic-addon1" name="cari" value="<?php if(isset($_GET['cari']))echo htmlspecialchars($_GET['cari']); ?>">	
	</div>
</form>
<a style="margin-top:10px; margin-bottom:10px;" class="btn btn-default pull-right" href="pegawai.php"><span class="glyphicon glyphicon-refresh"></span>  Reset Filter</a>
<br/>
<table class="table table-hover" id="myTable">
	<tr>
		<th class="col-md-1"onclick="sortTable(0)">No</th>
		<th class="col-md-2"onclick="sortTable(1)">Nama</th>
		<th class="col-md-3"onclick="sortTable(2)">Alamat</th>
		<th class="col-md-3"onclick="sortTable(3)">No HP</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($con,$_GET['cari']);
		$brg=mysqli_query($con, "select * from staffdata where nama like '%".$cari."%' or alamat like '%".$cari."%'");
		$total = mysqli_num_rows($brg);
		$pages = ceil($total/$halaman);

		if($total==0) {
			if($_GET['cari'] == "kosong"){
				echo "<div class='alert alert-danger'>Keyword belum dimasukkan!!</div>";
			} 
			else {
				echo "<div class='alert alert-warning'>Keyword tidak dapat ditemukan!!</div>";
			}
		}
		else {
			echo "<h4> Data Pegawai dengan keyword  <a style='color:blue'> ". $_GET['cari']."</a></h4>";
		}
	}
	else{
		$brg=mysqli_query($con, "select * from staffdata limit $mulai, $halaman");
	}
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['alamat'] ?></td>
			<td><?php echo $b['no_hp'] ?></td>
			<td>
				<a href="det_pegawai.php?staff_id=<?php echo $b['staff_id']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-info-sign"></span>Detail</a>
				<a href="edit_pegawai.php?staff_id=<?php echo $b['staff_id']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pegawai.php?staff_id=<?php echo $b['staff_id']; ?>' }" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	
</table>
<ul class="pagination">			
			<?php 
			for($i=1;$i<=$pages;$i++){
				$hal=isset($_GET["halaman"]);
				?>
				<li><a <?php if($hal!=NULL){if ($_GET["halaman"] == $i) {echo 'class="active"';}}else {if ($i==1){echo 'class="active"';}} ?> href="?halaman=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php
			}

			?>						
</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Pegawai Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_pegawai_act.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Pegawai</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Pegawai .." required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input name="alamat" type="text" class="form-control" placeholder="Alamat .." required>
					</div>
					<div class="form-group">
						<label>No HP</label>
						<input name="no_hp" type="text" class="form-control" placeholder="No HP .." required>
					</div>
					<div class="form-group">
						<label>Pendidikan Terakhir</label>
						<input name="pendidikan" type="text" class="form-control" placeholder="Pendidikan Terakhir .."required>
					</div>
					<div class="form-group">
						<label>Pengalaman Kerja Terakhir</label>
						<input name="pengalaman" type="text" class="form-control" placeholder="Pengalaman Kerja Terakhir .."required>
					</div>
					<div class="form-group">
						<label>Sertifikasi</label>
						<input name="sertifikasi" type="text" class="form-control" placeholder="Sertifikasi .."required>
					</div>
					<div class="form-group">
							<label>File</label>
							<input name="file" type="file" class="form-control" placeholder="..">
					</div>
					<!-- <div class="form-group">
						<label>Path File</label>
						<input name="path" type="text" class="form-control" value="<?php echo 'data/'.$b['year']; ?>">
					</div> -->
					 
						<div class="form-group">
							<input name="id" type="hidden" value="<?php echo $b['staff_id']; ?>">
						</div>		
						<div class="form-group">
							<label></label>
							<input type="reset" class="btn btn-danger" value="Reset">
						</div>																	
						
					<!-- <div class="form-group">
						<label>Total Penjualan</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Jual per unit">
					</div>	
					<div class="form-group">
						<label>Jumlah (kg)</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>																	 -->

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

<?php 
include 'footer.php';

?>