<?php 
// konfigurasi koneksi
$host       =  "localhost";
$dbuser     =  "postgres";
$dbpass     =  "han";
$port       =  "5432";
$dbname     =  "fpweb";
 
// script koneksi php postgree
$koneksi = new PDO("pgsql:host=$host;dbname=$dbname","$dbuser","$dbpass"); 
// Check connection
// if(!$koneksi){
// echo "Error : GAGAL CONNECT DATABASE\n";
// } else {
// echo "BERHASIL CONNECT DATABASE\n";
// }
?>	