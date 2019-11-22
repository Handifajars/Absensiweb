<?php 

include 'koneksi.php';

$id_jadwal = $_GET['id_jadwal'];

$hapus = $koneksi->query("DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'");
if ($hapus) {
	echo '<script language="javascript">alert("Data Berhasil Dihapus"); document.location="jadwal.php";</script>';
}
else{
	echo '<script language="javascript">alert("Data Gagal Dihapus"); document.location="jadwal.php";</script>';
}

?>