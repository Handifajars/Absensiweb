<!DOCTYPE html>
<html>
	<head>	
		<title>Tambah Jadwal Mengajar</title>
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
	</head>
	<body>	
				<div class="main">
			    	<div class="login-head">
					    <h1>Tambah Jadwal Mengajar Baru</h1>
					</div>
					<div  class="wrap">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>Jadwal</h2>
						 	 </div>
						  	<form action="insert_jadwal.php" method="POST">
						  		<input type="text" name="nip" placeholder="Masukkan NIP Pegawai" size="50" maxlength="50" required>
						  		<input type="text" name="nama_sekolah" placeholder="Masukkan Nama Sekolah" size="50" maxlength="50" required>
								<input type="text" name="jam" placeholder="Masukkan Jam 00:00:00" size="50" required>
								<select name="hari">
									<option value="Senin">Pilih Hari</option>
						  			<option value="Senin">Senin</option>
						  			<option value="Selasa">Selasa</option>
						  			<option value="Rabu">Rabu</option>
						  			<option value="Kamis">Kamis</option>
						  			<option value="Jumat">Jum'at</option>
						  			<option value="Sabtu">Sabtu</option>
						  		</select>
						  		<select name="golongan">
						  			<option value="1">Pilih Golongan Gaji</option>
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
									<div class="clear"><br> <a style="color:white;"href="../admin/jadwal.php">Kembali</a></div>
						  </form>
					</div>
					</div>
			</div>
				<!--//End-login-form-->	
						<div class ="copy-right">
							<p><a href="#">Cinema Innovator</a></p>
						</div>
			  </div>
	</body>
</html>


