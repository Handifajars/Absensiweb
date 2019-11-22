<!DOCTYPE html>
<html>
	<head>	
		<title>Gaji Pegawai</title>
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
	</head>
	<body>	
				<div class="main">
			    	<div class="login-head">
					    <h1>Gaji Pegawai</h1>
					</div>
					<div  class="wrap">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>Gajiku</h2>
						 	 </div>
						  	<form action="list_gaji.php" method="POST">
						  		<select name="bulan">
						  			<option value="1">Januari</option>
						  			<option value="2">Februari</option>
						  			<option value="3">Maret</option>
						  			<option value="4">April</option>
						  			<option value="5">Mei</option>
						  			<option value="6">Juni</option>
						  			<option value="7">Juli</option>
						  			<option value="8">Agustus</option>
						  			<option value="9">September</option>
						  			<option value="10">Oktober</option>
						  			<option value="11">November</option>
						  			<option value="12">Desember</option>
						  		</select>
						  		<input type="text" name="tahun" pattern="\d*" placeholder="Masukkan Tahun" size="35" maxlength="5" required>
								<div class="submit">
									<input type="submit" name="Submit" onclick="myFunction()" value="Kirimkan >" >
								</div>
									<div class="clear"><br> <a style="color:white;"href="../pegawai">Kembali</a></div>
						  </form>
					</div>
					</div>
			</div>
					<div class ="copy-right">
						<p><a href="#">Cinema Innovator</a></p>
					</div>
			  </div>
	</body>
</html>


