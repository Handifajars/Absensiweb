<?php 

include 'koneksi.php';

$sandi_baru = md5($_POST['sandi_baru']);
$ulang_sandi = md5($_POST['ulang_sandi']);
$nip = $_POST['nip'];

if ($sandi_baru != $ulang_sandi) {
	echo '<script language="javascript">alert("Sandi Tidak Cocok, Silakan Coba Lagi"); document.location="daftar_pegawai.php";</script>';
}

elseif ($sandi_baru == $ulang_sandi) {
	$update = $koneksi->query("UPDATE pegawai SET password='$sandi_baru' WHERE nip='$nip'");
	if ($update) {
		echo '<script language="javascript">alert("Password Berhasil Diupdate"); document.location="daftar_pegawai.php";</script>';
	}
	else{
		echo '<script language="javascript">alert("Password Gagal Diupdate, Silakan Coba Lagi"); document.location="daftar_pegawai.php";</script>';
	}
}

?>

