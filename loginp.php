<?php 

include "database/koneksi.php";
session_start();

$username = $_POST['username'];
$password = md5($_POST['pass']);
 
$query = $koneksi->query("select * from pegawai where nip='$username' and password='$password'");
$cek = $koneksi->query("SELECT * FROM pegawai WHERE nip='$username' AND status_pegawai='Tidak Aktif'");

if ($cek->rowcount()!=0) {
	echo '<script language="javascript">alert("Login Gagal, NIP Anda Sudah Tidak Berlaku"); document.location="index.html";</script>';
}
elseif($query->rowcount()==0){
    echo '<script language="javascript">alert("Login Gagal, Cek NIP dan Password Anda"); document.location="index.html";</script>';
    /*header('location: index.html');
    exit()*/
}
else{
	$_SESSION['status'] = "pegawai";
	echo '<script language="javascript">alert("Anda berhasil Login !"); document.location="pegawai/index.php";</script>';
	$_SESSION['username'] = $username;
}

?>