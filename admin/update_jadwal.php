<!DOCTYPE html>
<html>
	<head>	
		<title>Update Jadwal Mengajar</title>
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
	</head>
	<body>	
			<?php

				include 'koneksi.php';		
				$id_jadwal = $_GET['id_jadwal'];
				$query = $koneksi->query("select * from jadwal where id_jadwal='$id_jadwal'");
				while($data = $query->fetch()){
			?>
			<div class="main">
			    <div class="login-head">
				    <h1>Update Jadwal Mengajar Baru</h1>
				</div>
				<div  class="wrap">
					  <div class="Regisration">
					  	<div class="Regisration-head">
					    	<h2><span></span>Ubah</h2>
					 	 </div>
					  	<form action="proses_update_jadwal.php" method="POST">
					  		<input type="text" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>" size="50" readonly>
					  		<input type="text" name="nip" value="<?php echo $data['nip']; ?>" size="50" maxlength="50" required>
					  		<input type="text" name="nama_sekolah" value="<?php echo $data['nama_sekolah']; ?>" size="50" maxlength="50" required>
							<input type="text" name="jam" placeholder="00:00:00" value="<?php echo $data['jam']; ?>" required>
							<select name="hari">
					  			<option><?php echo $data['hari']; ?></option>
						  		<option value="Senin">Senin</option>
						  		<option value="Selasa">Selasa</option>
						  		<option value="Rabu">Rabu</option>
						  		<option value="Kamis">Kamis</option>
						  		<option value="Jumat">Jum'at</option>
						  		<option value="Sabtu">Sabtu</option>
						  	</select>
						  	<select name="golongan">
						  		<option><?php echo $data['golongan']; ?></option>
						  		<option value="1">Rp.50.000</option>
						  		<option value="2">Rp.55.000</option>
						  		<option value="3">Rp.60.000</option>
						  		<option value="4">Rp.65.000</option>
						  		<option value="5">Rp.70.000</option>
						  		<option value="6">Rp.75.000</option>
						  		<option value="7">Rp.80.000</option>
						  		<option value="8">Rp.85.000</option>
						  		<option value="9">Rp.90.000</option>
						  		<option value="10">Rp.95.000</option>
						  		<option value="11">Rp.100.000</option>
						  		<option value="12">Rp.105.000</option>
						  		<option value="13">Rp.110.000</option>
						  		<option value="14">Rp.115.000</option>
						  		<option value="15">Rp.120.000</option>
						  		<option value="16">Rp.125.000</option>
						  		<option value="17">Rp.130.000</option>
						  		<option value="18">Rp.135.000</option>
						  		<option value="19">Rp.140.000</option>
						  		<option value="20">Rp.145.000</option>
						  		<option value="21">Rp.150.000</option>
						  	</select>
							<div class="submit">
								<input type="submit" name="Submit" onclick="myFunction()" value="Kirimkan >" >
							</div>
								<div class="clear"><br> <a style="color:white;"href="jadwal.php">Kembali</a></div>
											
					  </form>
				</div>
				</div>
			</div>
				<!--//End-login-form-->	
			<div class ="copy-right">
				<p><a href="#">Cinema Innovator</a></p>
			</div>
			<?php  }?>
	</body>
</html>