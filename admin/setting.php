<!DOCTYPE html>
<html>
	<head>	
		<title>Pengaturan Admin</title>
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
	</head>
	<body>	
				<div class="main">
			    	<div class="login-head">
					    <h1>Pengaturan Admin</h1>
					</div>
					<div  class="wrap">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>Pengaturan</h2>
						 	 </div>
							<div class="submit2">
								<br>
								<br>
								<?php echo'<a href="hapus_riwayat.php "onclick="return confirm(\'Riwayat Absen Akan Terhapus Seluruhnya, Anda Yakin?\')">Reset Riwayat Absen</a>';?><br><br><br>
								<?php echo'<a href="hapus_gaji.php "onclick="return confirm(\'Data Gaji Pegawai Akan Terhapus Seluruhnya, Anda Yakin?\')">Reset Gaji</a>';?><br><br><br>
								<?php echo'<a href="sandi.php "onclick="return confirm(\'Anda Yakin?\')">Ubah Password Admin</a>';?>
							</div>
							<br>
							<div class="clear"><br> <a style="color:white;"href="index.php">Kembali</a></div>
							<br>
					</div>
					</div>
			</div>
						<div class ="copy-right">
							<p><a href="#">Cinema Innovator</a></p>
						</div>
			  </div>
	</body>
</html>


