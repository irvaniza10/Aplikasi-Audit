<?php 
include 'header.php';
?>

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

<div class="col-md-10">
	<h3>Selamat datang</h3>	
    <h3>Aplikasi audit ini merupakan aplikasi yang diharapkan dapat membantu mempermudah staff kantor KAP Irwanto Hary Usman dalam mengelola data pada kantor tersebut.</h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>