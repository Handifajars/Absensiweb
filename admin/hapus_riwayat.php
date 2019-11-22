<?php 
	
	include 'koneksi.php';

	$query = $koneksi->query("TRUNCATE TABLE absen");

	if ($query) {
		echo '<script language="javascript">alert("Riwayat Absen Telah Dihapus"); document.location="index.php";</script>';
	}
	else{
		echo '<script language="javascript">alert("Riwayat Absen Gagal Dihapus"); document.location="setting.php";</script>';
	}

?>