<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
	include 'cek.php';
	include 'config.php';
	?>
	<title>KAP Irwanto Hary Usman</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/gif/png" href="../logo/ihufirm.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">KAP Irwanto Hary Usman</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerMenu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="headerMenu">				
				<ul class="nav navbar-nav navbar-right">
					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hi , <?php echo $_SESSION['uname']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					<?php 
					$periksa=mysqli_query($con,"select * from clientdata");
					while($q=mysqli_fetch_array($periksa)){	
						if($q['status']=="Pre-Engagement"){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Client  <a style='color:red'>". $q['company_name']."</a> sedang dalam proses Pre-Engagement</div>";	
						}
					}
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row">
			<?php 
			$use=$_SESSION['uname'];
			$fo=mysqli_query($con,"select foto from userdata where uname='$use'");
			while($f=mysqli_fetch_array($fo)){
				?>				

				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="foto/<?php echo $f['foto']; ?>">
					</a>
				</div>
				<?php 
			}
			?>		
		</div>
		
		<div class="navbar navbar-default">
			<div class="navbar-header">
				<div class="mobileShow">Menu</div>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsible">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="collapsible">				
				<ul class="nav nav-pills nav-stacked">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
				<li><a href="audit.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Audit</a></li>
				<li><a href="client.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Client</a></li>
				<li><a href="pegawai.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Pegawai</a></li>        												
				<li><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
				<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>	
				</ul>
			</div>
		</div>
		</div>

		<!-- <div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="audit.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Audit</a></li>
			<li><a href="client.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Client</a></li>
			<li><a href="pegawai.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Pegawai</a></li>        												
			<li><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
		</div> -->
	<div class="col-md-10">
	
	
	<script type="text/javascript">
		$(function(){
			$('.headerMenu').on('show.bs.collapse', function(e) {
			$('.headerMenu').not(this).collapse('hide');
			});
		});
		
		$(function() {
		$("li").removeClass("active");
		var current = window.location.pathname.split('/').pop();
		var substring  = "audit";
		var substring2 = "client";
		var substring3 = "pegawai";
		if(current.indexOf(substring) !== -1) {
			$('a[href="audit.php"]').addClass("active");
		}
		if(current.indexOf(substring2) !== -1) {
			$('a[href="client.php"]').addClass("active");
		}
		if(current.indexOf(substring3) !== -1) {
			$('a[href="pegawai.php"]').addClass("active");
		}
		else {
			$('a[href="' + current + '"]').addClass("active");
		}
		});
	</script>