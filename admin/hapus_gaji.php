<?php 
	
	include 'koneksi.php';

	$query1 = $koneksi->query("TRUNCATE TABLE data_gaji");
	$query2 = $koneksi->query("TRUNCATE TABLE gaji_pegawai");

	if ($query1 && $query2) {
		echo '<script language="javascript">alert("Riwayat Gaji Telah Dihapus"); document.location="index.php";</script>';
	}
	else{
		echo '<script language="javascript">alert("Riwayat Absen Gagal Dihapus"); document.location="setting.php";</script>';
	}

?>