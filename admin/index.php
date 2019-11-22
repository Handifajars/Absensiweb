<?php
include 'akses.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Form ADMIN</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>SELAMAT DATANG</h1>
						<p>Sistem Informasi &nbsp;&bull;&nbsp; Absensi &nbsp;&bull;&nbsp; Cinema Innovator</p>
						<nav>
							<ul>
								<a href="tambah_pegawai.php"><img src="../images/tambah.png" alt="" width="100" height="100" class="fa-scroll" title="Tambah Pegawai">&emsp;</a>
								<a href="daftar_pegawai.php"><img src="../images/daftarp.png" alt="" width="100" height="100" class="fa-scroll" title="Daftar Pegawai"/>&emsp;</a>
								<a href="jadwal.php"><img src="../images/jadwal.png" width="100" height="100" class="fa-scroll" title="Jadwal Mengajar"/>&emsp;</a>
								<a href="riwayat.php"><img src="../images/riwayat.png" width="100" height="100" class="fa-scroll" title="Riwayat"/>&emsp;</a>
								<a href="gaji.php"><img src="../images/gaji.png" width="100" height="100" class="fa-scroll" title="Gaji Pegawai"/>&emsp;</a>
								<a href="setting.php"><img src="../images/setting.png" width="100" height="100" class="fa-scroll" title="Pengaturan Admin"/>&emsp;</a>
								<a href="proses_logout.php"><img src="../images/logout.png" width="100" height="100" class="fa-scroll" title="Keluar"/>&emsp;</a>
							</ul>
						</nav>
					</header>

				<!-- Footer -->
					<footer id="footer">
						<strong><font size="5"><span class="copyright">&copy;</font><strong><font color='blue' size="5"></font> <a href="https://www.google.com/maps/place/Kantor+Cinema+Innovator+Cabang+Surabaya/@-7.3381106,112.8001882,15z/data=!4m2!3m1!1s0x0:0x786cc38a1ab86692?sa=X&ved=2ahUKEwju57i4u8XkAhXEX3wKHQQsC80Q_BIwE3oECA0QCA"><font color='red' size="5">Gerakan Kreativitas</font><font size="5"> Untuk Indonesia</font></strong></strong></a>.</span>
					</footer>
			</div>
		</div>
		<script>
			window.onload = function() { document.body.classList.remove('is-preload'); }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>