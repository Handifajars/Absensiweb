<?php
	include 'koneksi.php';
	include 'akses.php';
?>
<!DOCTYPE html>
<style>
	* {
		box-sizing: border-box;
	}
		#myInput {
			background-position: 10px 10px;
			background-repeat: no-repeat;
			width: 100%;
			font-size: 16px;
			padding: 12px 20px 12px 40px;
			border: 1px solid #ddd;
			margin-bottom: 12px;
		}
		#myTable {
			border-collapse: collapse;
			width: 100%;
			border: 1px solid #ddd;
			font-size: 18px;
		}
		#myTable th, #myTable td {
			text-align: left;
			padding: 12px;
		}
		#myTable tr {
			border-bottom: 1px solid #ddd;
		}
		#myTable tr.header, #myTable tr:hover {
			background-color: #f1f1f1;
		}
</style>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="../public/dasboard/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dasboard/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/dasboard//css/fontastic.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="../public/dasboard/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../public/dasboard/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
<head>
	<title>Absensi Pegawai</title>
</head>
<body>
	<div class="page">
      <div class="page-content d-flex align-items-stretch"> 
        <nav class="side-navbar">
          </div>
        <div class="content-inner">
          <section>
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                	<h2 style="text-align: center;">Absensi Pegawai</h2>
                	<h5 style="text-align: right;"><a href="index.php"> < Kembali </a></h5>
               </div>
	<div class="card-body">
                  <div class="row">
                  </div>
	<div class="table-responsive">
	<table id="myTable">
		<th>Nama Sekolah</th>
		<th>Hari</th>
		<th>Pukul</th>
		<th>Absen Masuk</th>

		<?php
			date_default_timezone_set('Asia/Jakarta');
			$username = $_SESSION['username'];
			$nip_pengganti = $_POST['nip'];
			$_SESSION['nip_pengganti'] = $nip_pengganti;
			$tanggal = date('Y-m-d');
			$jam = date('H:i:s');
			$day = date('D', strtotime($tanggal));
			$dayList = array(
			    'Sun' => 'Minggu',
			    'Mon' => 'Senin',
			    'Tue' => 'Selasa',
			    'Wed' => 'Rabu',
			    'Thu' => 'Kamis',
			    'Fri' => 'Jumat',
			    'Sat' => 'Sabtu'
			);
			if($username==$nip_pengganti) {
				echo '<script language="javascript">alert("Anda Memasukkan NIP Anda Sendiri, Silakan Coba Lagi"); document.location="index.php";</script>';
			}
			
			$query = $koneksi->query("SELECT jadwal.nama_sekolah, jadwal.hari, jadwal.jam FROM jadwal INNER JOIN pegawai ON jadwal.nip=pegawai.nip AND jadwal.nip='$nip_pengganti' AND jadwal.hari='$dayList[$day]'");

			if($query->rowcount()>0) {
				while($data = $query->fetch()) {
					$waktu=date_create($data['jam']);
					date_add($waktu,date_interval_create_from_date_string('-30 minutes'));
					$waktu=date_format($waktu,'H:i:s');
					$waktus=date_create($data['jam']);
					$waktus=date_format($waktus,'H:i:s');
					$selisih=0;
					if($jam>=$waktu && $jam<=$waktus) {
						$waktu=date_create($data['jam']);
						$waktu=date_format($waktu,'H:i:s');
						$selisih=date_create($data['jam']);
						date_add($selisih,date_interval_create_from_date_string('-30 minutes'));
						$selisih=date_format($selisih,'H:i:s');
						break;
					}
				}
				if($selisih==0) {
					echo '<script language="javascript">alert("Belum Waktunya Absen"); document.location="index.php";</script>';
				}
				elseif($selisih!=0) {
					if($jam>=$selisih && $jam<=$waktu) {
        				echo'<tr>';
            			echo'<td data-header="Nama Sekolah" class="title">'.$data['nama_sekolah'].'</td>';
            			echo'<td data-header="Hari" class="title">'.$data['hari'].'</td>';
            			echo'<td data-header="Pukul" class="title">'.$data['jam'].'</td>';
            			echo'<td data-header="Absen Masuk"><a href="proses_absen_masuk_pengganti.php"><button type="Button">Absen Masuk</button></a></td>';
        				echo'</tr>';
					}
					else{
						echo '<script language="javascript">alert("Belum Waktunya Absen"); document.location="index.php";</script>';
					}	
				}
			}
			else{ 
				echo '<script language="javascript">alert("Tidak Ada Absen Hari ini"); document.location="index.php";</script>';
			}
		?>
		</table>
</div>
</body>
</html>