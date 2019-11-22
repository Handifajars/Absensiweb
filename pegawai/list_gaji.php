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
	<title>Gaji Pegawai</title>
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
                	<h2 style="text-align: center;">Gaji Pegawai</h2>
                	<h5 style="text-align: right;"><a href="index.php"> < Kembali </a></h5>
               </div>
	<div class="card-body">
                  <div class="row">
                  </div>
	<div class="table-responsive">
	<table id="myTable">
		<th>Nama Sekolah</th>
		<th><center>Bulan</center></th>
		<th><center>Banyak Pertemuan</center></th>
		<th>Gaji</th>
		<th>Total Gaji</th>

		<?php
			$bulan = $_POST['bulan'];
			$tahun = $_POST['tahun'];
			$username = $_SESSION['username'];
			$tanggal = date('Y-m-d');

			$tes = $koneksi->query("SELECT nama_sekolah, bulan, COUNT(banyak_pertemuan) AS pertemuan, gaji, SUM(gaji) AS Total FROM gaji_pegawai where nip='$username' AND bulan='$bulan' AND tahun='$tahun' GROUP by nama_sekolah");
			$totalgaji = $koneksi->query("SELECT SUM(banyak_pertemuan*gaji) AS Total_Gaji FROM gaji_pegawai where nip='$username' AND bulan='$bulan' AND tahun='$tahun'");
			if($tes) {
				if($tes->rowcount()>0) {
					while($data = $tes->fetch_assoc()) {
						echo'<tr>';
							echo'<td>'.$data['nama_sekolah'].'</td>';
							echo'<td><center>'.$data['bulan'].'</center></td>';
							echo'<td><center>'.$data['pertemuan'].'</center></td>';
							echo'<td>Rp. '.$data['gaji'].'</td>';
							echo'<td>Rp. '.$data['Total'].'</td>';
						echo'</tr>';
					}
				}
				elseif($tes->rowcount()==0) {
					echo '<script language="javascript">alert("Gaji Belum Tersedia"); document.location="index.php";</script>';
				}
			}
			if($totalgaji) {
				if($totalgaji->rowcount()>0) {
					while($datagaji = $totalgaji->fetch()) {
						echo'<tr>';
							echo'<td><h5>Total Gaji Keseluruhan</h5></td>';
							echo'<td></td>';
							echo'<td></td>';
							echo'<td></td>';
							echo'<td>Rp. '.$datagaji['total_gaji'].'</td>';
						echo'</tr>';
					}
				}
			}
		?>
		</table>
</div>
</body>
</html>