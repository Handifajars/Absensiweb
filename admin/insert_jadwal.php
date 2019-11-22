<?php 

include 'koneksi.php';

$nip = $_POST['nip'];
$nama_sekolah = $_POST['nama_sekolah'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$golongan = $_POST['golongan'];

$cek = $koneksi->query("SELECT id_jadwal FROM jadwal ORDER BY id_jadwal DESC");
$data = $cek->fetch();

$str = str_replace("J","0",$data['id_jadwal']);
$int = number_format($str);
$int = $int + 1;
$int = sprintf("%04d", $int);

$insert = $koneksi->query("INSERT INTO jadwal VALUES('J$int','$nip','$nama_sekolah','$hari','$jam','$golongan')");

if($insert){
	echo '<script language="javascript">alert("Data Berhasil Ditambahkan"); document.location="jadwal.php";</script>';
}
else{
	echo '<script language="javascript">alert("Data Gagal Ditambahkan, ID Jadwal Telah Digunakan"); document.location="tambah_jadwal.php";</script>';
}

?>