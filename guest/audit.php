<?php include 'header.php'; include '../admin/config.php'; //echo md5(''); ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Audit</h3>
<!-- <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Audit</button> -->
<br/>
<br/>

<?php 
if(isset($_GET['pesan'])){
	$pesan=mysqli_real_escape_string($con, $_GET['pesan']);
	if($pesan=="replace"){
		echo "<div class='alert alert-success'>File sukses diupload dan diganti</div>";
	}else if($pesan=="oke"){
		echo "<div class='alert alert-success'>File sukses diupload dan ditambahkan</div>";
	}else if($pesan=="filekosong"){
		echo "<div class='alert alert-danger'>File tidak boleh kosong !!</div>";
	}else if($pesan=="oversize"){
		echo "<div class='alert alert-warning'>File melebihi 10MB !!</div>";
	}else if($pesan=="tidaksesuai"){
		echo "<div class='alert alert-danger'>Ekstensi file harus .xlsx </div>";
	}else if($pesan=="tidaksesuai"){
		echo "<div class='alert alert-danger'>Ekstensi file harus .xlsx </div>";
	}else if($pesan=="tidaksama"){
		echo "<div class='alert alert-danger'>Nama file dengan nama client tidak sama !! </div>";
	}
}
?>

<?php
$halaman = 10;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($con,"select * from audit");
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
	<!-- <a style="margin-bottom:10px" href="lap_audit.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a> -->
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari audit di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="year" class="form-control" onchange="this.form.submit()">
			<option>Pilih tahun ..</option>
			<?php 
			$pil=mysqli_query($con,"select distinct year from audit order by year desc");
			while($p=mysqli_fetch_array($pil)){
				?>
				<option><?php echo $p['year'] ?></option>
				<?php
			}
			?>			
		</select>
	</div>

</form>
<a style="margin-top:10px; margin-bottom:10px;" class="btn btn-default pull-right" href="audit.php"><span class="glyphicon glyphicon-refresh"></span>  Reset Filter</a>
<br/>
<?php 
if(isset($_GET['year'])){
	echo "<h4> Data Audit Tahun  <a style='color:blue'> ". $_GET['year']."</a></h4>";
}
?>
<table class="table table-hover" id="myTable">
	<tr>
		<th class="col-md-1"onclick="sortTable(0)">No</th>
		<th class="col-md-2"onclick="sortTable(1)">Tanggal</th>
		<th class="col-md-3"onclick="sortTable(2)">Nama Audit</th>
		<th class="col-md-3"onclick="sortTable(3)">Nama Client</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($con,$_GET['cari']);
		$brg=mysqli_query($con, "select * from audit where audit_name like '%".$cari."%' or company like '%".$cari."%'");
		
		$total = mysqli_num_rows($brg);
		$pages = ceil($total/$halaman);
		
		if($total==0) {
			if($_GET['cari'] == "kosong"){
				echo "<div class='alert alert-danger'>Keyword belum dimasukkan!!</div>";
			} 
			else {
				echo "<div class='alert alert-warning'>Keyword '$cari' tidak dapat ditemukan!!</div>";
			}
		}
		else {
			echo "<h4> Data Audit dengan keyword  <a style='color:blue'> ". $_GET['cari']."</a></h4>";
		}
	}
	else{
		$brg=mysqli_query($con, "select * from audit limit $mulai, $halaman");
	}
	if(isset($_GET['year'])){
		$tahun=mysqli_real_escape_string($con,$_GET['year']);
		$brg=mysqli_query($con,"select * from audit where year like '$tahun' order by year desc");
	}
	while($b=mysqli_fetch_array($brg)){
		?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td><?php echo $b['audit_name'] ?></td>
			<td><?php echo $b['company'] ?></td>
			<td>
				<a href="det_audit.php?audit_id=<?php echo $b['audit_id']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-info-sign"></span>Detail</a>
				<!-- <a href="edit.php?audit_id=<?php echo $b['audit_id']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?audit_id=<?php echo $b['audit_id']; ?>' }" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Hapus</a> -->
			</td>
		</tr>		
		<?php 
	}

	?>
	
</table>
<ul class="pagination">			
			<?php 
			$hal=isset($_GET["halaman"]);
			for($i=1;$i<=$pages;$i++){
				?>
				<li><a <?php if($hal!=NULL){if ($_GET["halaman"] == $i) {echo 'class="active"';}}else {if ($i==1){echo 'class="active"';}} ?>href="?halaman=<?php echo $i;?>"><?php echo $i;?></a></li>
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
				<h4 class="modal-title">Tambah Audit Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_audit_act.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tanggal</label>
						<input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>Nama Audit</label>
						<input name="audit_name" type="text" class="form-control" placeholder="Nama Audit .." required>
					</div>
					<div class="form-group">
						<label>Nama Client</label>
						<input name="company" type="text" class="form-control" placeholder="Nama Client .." required>
					</div>
					<!-- <div class="form-group">
						<label>Tahun</label>
						<input name="year" type="text" class="form-control" placeholder="Tahun ..">
						<select class="form-control" name="year">
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						</select>
					</div> -->
					<!-- <div class="form-group">
						<label>Path File</label>
						<input name="path" type="text" class="form-control" value="<?php echo 'data/'.$b['year']; ?>">
					</div> -->
					 
						<div class="form-group">
							<input name="audit_id" type="hidden" value="<?php echo $b['audit_id']; ?>">
						</div>
						<div class="form-group">
							<label>File</label>
							<input name="file" type="file" class="form-control" placeholder="..">
						</div>
						<div><h5><font color="red">*nama file harus sama dengan nama client</h5></font></div>		
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

<script type="text/javascript">
	$(document).ready(function(){
		$tanggal=$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
	});
</script>

<script type="text/javascript">
	function getTgl(){
		var date=document.getElementById("tgl").value;
		echo date;
	}
</script>
<?php 
include 'footer.php';

?>