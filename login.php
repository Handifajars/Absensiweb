<?php 

include "database/koneksi.php";
session_start();

$username = $_POST['username'];
$password = md5($_POST['pass']);
 
$query = $koneksi->query( "select * from admin where username='$username' and password='$password'");

if($query->rowcount()==0){
    // Jika false maka akan muncul alert
    echo '<script language="javascript">alert("Login Gagal, Silakan Cek Username & Password"); document.location="admin.html";</script>';
    /*header('location: index.html');
    exit()*/
}
else{
	$_SESSION['status'] = "admin";
	echo '<script language="javascript">alert("Anda berhasil Login !"); document.location="admin/index.php";</script>';
}

?>

