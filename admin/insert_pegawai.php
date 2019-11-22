<?php 

include 'koneksi.php';

$nama = $_POST['nama'];
$password = md5($_POST['password']);
$jenkel = $_POST['jenkel'];
$telepon = $_POST['telepon'];
$status = $_POST['status'];

$cek = $koneksi->query("SELECT nip FROM pegawai ORDER BY nip DESC");
$data = $cek->fetch();

$str = str_replace("P","0",$data['nip']);
$int = number_format($str);
$int = $int + 1;
$int = sprintf("%04d", $int);

$insert = $koneksi->query("INSERT INTO pegawai VALUES('P$int','$nama','$jenkel','$telepon','$status','$password')");

if($insert){
	echo '<script language="javascript">alert("Data Berhasil Ditambahkan"); document.location="daftar_pegawai.php";</script>';
}
else{
	echo '<script language="javascript">alert("Data Gagal Ditambahkan, Data NIP Telah Digunakan"); document.location="tambah_pegawai.php";</script>';
}

?>