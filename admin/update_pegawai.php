<!DOCTYPE html>
<html>
	<head>	
		<title>Update Data Pegawai</title>
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
	</head>
	<body>	
			<?php

				include 'koneksi.php';		
				$nip = $_GET['nip'];
				$query = $koneksi->query("select * from pegawai where nip='$nip'");
				while($data = $query->fetch()){
			?>
			<div class="main">
			    <div class="login-head">
				    <h1>Perbaharui Data Pegawai</h1>
				</div>
				<div  class="wrap">
					  <div class="Regisration">
					  	<div class="Regisration-head">
					    	<h2><span></span>Ubah</h2>
					 	 </div>
					  	<form action="proses_update_pegawai.php" method="POST">
					  		<input type="text" name="nip" value="<?php echo $data['nip']; ?>" size="50" readonly>
					  		<input type="text" name="nama" value="<?php echo $data['nama']; ?>" size="50" maxlength="50" required>
							<input type="text" name="no_hp" pattern="\d*" value="<?php echo $data['no_hp']; ?>" required>
							<select name="jenis_kelamin">
									<option><?php echo $data['jenis_kelamin']; ?></option>
									<option value="L">Laki-Laki</option>
						  			<option value="P">Perempuan</option>
						  	</select>
							<select name="status">
									<option><?php echo $data['status_pegawai']; ?></option>
									<option value="Aktif">Aktif</option>
						  			<option value="Tidak Aktif">Tidak Aktif</option>
						  	</select>
							<div class="submit">
								<input type="submit" name="Submit" onclick="myFunction()" value="Kirimkan >" >
							</div>
								<div class="clear"><br> <a style="color:white;"href="daftar_pegawai.php">Kembali</a></div>
											
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