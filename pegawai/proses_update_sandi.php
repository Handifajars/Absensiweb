<?php 

include 'koneksi.php';
include 'akses.php';

$sandi_lama = md5($_POST['sandi_lama']);
$sandi_baru = md5($_POST['sandi_baru']);
$ulang_sandi = md5($_POST['ulang_sandi']);
$nip = $_SESSION['username'];
$query = $koneksi->query("SELECT password FROM pegawai WHERE nip='$nip'");
$data = $query->fetch();

if ($sandi_lama!=$data['password']) {
	echo '<script language="javascript">alert("Sandi Lama Tidak Cocok, Silakan Coba Lagi"); document.location="sandi.php";</script>';
}
elseif ($sandi_baru != $ulang_sandi) {
	echo '<script language="javascript">alert("Sandi Baru Tidak Cocok, Silakan Coba Lagi"); document.location="sandi.php";</script>';
}
elseif ($sandi_baru == $ulang_sandi) {
	$update = mysqli_query($koneksi, "UPDATE pegawai SET password='$sandi_baru' WHERE nip='$nip'");
	if ($update) {
		echo '<script language="javascript">alert("Password Berhasil Diupdate"); document.location="index.php";</script>';
	}
	else{
		echo '<script language="javascript">alert("Password Gagal Diupdate"); document.location="index.php";</script>';
	}
}

?>

