<!DOCTYPE html>
<html>
	<head>	
		<title>Ubah Kata Sandi</title>
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
		<!--webfonts-->
	</head>
	<body>	
			<!--start-login-form-->
				<div class="main">
			    	<div class="login-head">
					    <h1>Ubah Kata Sandi</h1>
					</div>
					<div  class="wrap">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>Kata Sandi</h2>
						 	 </div>
						  	<form action="proses_update_sandi.php" method="POST">
						  		<input type="password" name="sandi_lama" placeholder="Masukkan Sandi Lama" size="50"	required>
						  		<input type="password" name="sandi_baru" placeholder="Masukkan Sandi Baru" size="50"	required>
						  		<input type="password" name="ulang_sandi" placeholder="Ulangi Sandi" size="50" required>
								<div class="submit">
									<input type="submit" name="Submit" onclick="myFunction()" value="Kirimkan >" >
								</div>
									<div class="clear"><br> <a style="color:white;"href="index.php">Kembali</a></div>
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


