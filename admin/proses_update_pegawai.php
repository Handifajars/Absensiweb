<?php 

include 'koneksi.php';

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_hp = $_POST['no_hp'];
$status = $_POST['status'];

$update = $koneksi->query("UPDATE pegawai SET nama='$nama', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', status_pegawai ='$status' WHERE nip='$nip'");
if ($update) {
	echo '<script language="javascript">alert("Data Berhasil Diupdate"); document.location="daftar_pegawai.php";</script>';
}
else{
	echo '<script language="javascript">alert("Data Gagal Diupdate, Silakan Coba Lagi"); document.location="daftar_pegawai.php";</script>';
}

?>

