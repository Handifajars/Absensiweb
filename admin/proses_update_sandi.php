<?php 

include 'koneksi.php';

$sandi_baru = md5($_POST['sandi_baru']);
$ulang_sandi = md5($_POST['ulang_sandi']);

if ($sandi_baru != $ulang_sandi) {
	echo '<script language="javascript">alert("Sandi Tidak Cocok, Silakan Coba Lagi"); document.location="sandi.php";</script>';
}

elseif ($sandi_baru == $ulang_sandi) {
	$update = $koneksi->query( "UPDATE admin SET password='$sandi_baru' WHERE username='admin'");
	if ($update) {
		echo '<script language="javascript">alert("Password Berhasil Diupdate"); document.location="index.php";</script>';
	}
	else{
		echo '<script language="javascript">alert("Password Gagal Diupdate, Silakan Coba Lagi"); document.location="sandi.php";</script>';
	}
}

?>

