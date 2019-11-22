<?php 

include 'koneksi.php';

$nip = $_GET['nip'];

$hapus = $koneksi->query("DELETE FROM pegawai WHERE nip='$nip'");
if ($hapus) {
	echo '<script language="javascript">alert("Data Berhasil Dihapus"); document.location="daftar_pegawai.php";</script>';
}
else{
	echo '<script language="javascript">alert("Data Gagal Dihapus, Silakan Coba Lagi"); document.location="daftar_pegawai.php";</script>';
}

?>