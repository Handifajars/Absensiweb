<?php 

include 'koneksi.php';

$id_jadwal = $_POST['id_jadwal'];
$nip = $_POST['nip'];
$nama_sekolah = $_POST['nama_sekolah'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$golongan = $_POST['golongan'];

$update = $koneksi->query("UPDATE jadwal SET nip='$nip', nama_sekolah='$nama_sekolah', hari='$hari', jam='$jam', golongan='$golongan' WHERE id_jadwal='$id_jadwal'");
if ($update) {
	echo '<script language="javascript">alert("Data Berhasil Diupdate"); document.location="jadwal.php";</script>';
}
else{
	echo '<script language="javascript">alert("Data Gagal Diupdate, Silakan Coba Lagi"); document.location="jadwal.php";</script>';
}

?>

