<?php
// memulai session
include "akses.php";
// cek apakah session yang dibuat tadi true untuk status berisikan login
if($_SESSION['status']=="pegawai"){
	// jika true maka akan menampilkan alert
	session_unset();
	session_destroy();
	echo '<script>document.location="../index.html";</script>';
}
elseif($_SESSION['status']!="pegawai"){
	echo '<script language="javascript">alert("Anda Belum Login"); document.location="../index.html";</script>';
}
?>