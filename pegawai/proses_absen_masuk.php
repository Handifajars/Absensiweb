<?php

	include 'koneksi.php';
	include 'akses.php';

	date_default_timezone_set('Asia/Jakarta');
	$username = $_SESSION['username'];
	$id_absen = uniqid();
	$id_gaji = uniqid();
	$status_absen = $_POST['status_absen'];
	$tgl = date('Y-m-d');
	$bln = date('m');
	$thn = date('Y');
	$jam = date('H:i:s');
	$day = date('D', strtotime($tgl));
			$dayList = array(
			    'Sun' => 'Minggu',
			    'Mon' => 'Senin',
			    'Tue' => 'Selasa',
			    'Wed' => 'Rabu',
			    'Thu' => 'Kamis',
			    'Fri' => 'Jumat',
			    'Sat' => 'Sabtu'
			);

	$cek1 = $koneksi->query("SELECT * FROM absen WHERE nip='$username' AND tgl='$tgl'");
	$cek2 = $koneksi->query("SELECT jadwal.nama_sekolah, jadwal.hari, jadwal.jam FROM jadwal INNER JOIN pegawai ON jadwal.nip=pegawai.nip AND jadwal.nip='$username' AND jadwal.hari='$dayList[$day]'");
	if ($cek2) {
		if($cek2->rowcount()==0) {
			echo '<script language="javascript">alert("Tidak Ada Absen Hari ini"); document.location="index.php";</script>';
		}
		elseif($cek2->rowcount()>0) {
			while($datacek2=$cek2->fetch()){
				$waktu=date_create($datacek2['jam']);
				date_add($waktu,date_interval_create_from_date_string('-60 minutes'));
				$waktu=date_format($waktu,'H:i:s');
				$waktus=date_create($datacek2['jam']);
				$waktus=date_format($waktus,'H:i:s');
				if($jam>=$waktu && $jam<=$waktus) {
					$waktu=date_create($datacek2['jam']);
					$waktu=date_format($waktu,'H:i:s');
					$selisih=date_create($datacek2['jam']);
					date_add($selisih,date_interval_create_from_date_string('-30 minutes'));
					$selisih=date_format($selisih,'H:i:s');
					$nama_sekolah = $datacek2['nama_sekolah'];
					$waktup=NULL;
					break;
				}
			}
			if($jam>=$selisih && $jam<=$waktu) {
				$cek1p = $koneksi->query("SELECT * FROM absen WHERE nip=nip AND status_masuk='Menggantikan $username' AND tgl='$tgl'");
				if($cek1->rowcount()==0 && $cek1p->rowcount()==0) {
					$query = $koneksi->query("INSERT INTO absen VALUES('$id_absen','$username','$tgl','$jam','$status_absen','$waktu')");
					$gaji = $koneksi->query("INSERT INTO data_gaji VALUES('$id_gaji','$username','$tgl','$nama_sekolah')");
					$tes = $koneksi->query("SELECT DISTINCT data_gaji.nama_sekolah,gaji.nominal FROM data_gaji NATURAL JOIN jadwal NATURAL JOIN gaji WHERE data_gaji.nip='$username'");
					if($tes) {
						while($tesgaji = $tes->fetch()) {
							if($nama_sekolah==$tesgaji['nama_sekolah']) {
								$uang=$tesgaji['nominal'];
								break;
							}
						}
					}
					$inputgaji = $koneksi->query("INSERT INTO gaji_pegawai VALUES('$username','$nama_sekolah','$bln','$thn',1,'$uang')");
					echo '<script language="javascript">alert("Absen Berhasil"); document.location="index.php";</script>';
				}
				elseif($cek1p->rowcount()>0){
					if($cek1->rowcount()==0) {
						while($datacek1p=$cek1p->fetch()) {
							if($datacek1p['count']==$waktu) {
								$waktup = $datacek1p['count'];
								break;
							}
						}
						if($waktup==$waktu) {
							echo '<script language="javascript">alert("Absen Sudah Digantikan"); document.location="index.php";</script>';
						}
						elseif($waktup!=$waktu) {
							$query = $koneksi->query("INSERT INTO absen VALUES('$id_absen','$username','$tgl','$jam','$status_absen','$waktu')");
							$gaji = $koneksi->query("INSERT INTO data_gaji VALUES('$id_gaji','$username','$tgl','$nama_sekolah')");
							$tes = $koneksi->query("SELECT DISTINCT data_gaji.nama_sekolah,gaji.nominal FROM data_gaji NATURAL JOIN jadwal NATURAL JOIN gaji WHERE data_gaji.nip='$username'");
							if($tes) {
								while($tesgaji=$tes->fetch()) {
									if($nama_sekolah==$tesgaji['nama_sekolah']) {
										$uang=$tesgaji['nominal'];
										break;
									}
								}
							}
							$inputgaji = $koneksi->query("INSERT INTO gaji_pegawai VALUES('$username','$nama_sekolah','$bln','$thn',1,'$uang')");
							echo '<script language="javascript">alert("Absen Berhasil"); document.location="index.php";</script>';
						}
					}
					else{
						while($datacek1=$cek1->fetch()) {
							$cekwaktu=date_create($datacek1['count']);
							$cekwaktu=date_format($cekwaktu,'H:i:s');
							if($waktu==$cekwaktu) {
								break;
							}
						}
						if($waktu==$cekwaktu) {
							echo '<script language="javascript">alert("Anda Sudah Melakukan Absen"); document.location="index.php";</script>';
						}
						elseif($waktu!=$cekwaktu) {
							while($datacek1p=$cek1p->fetch()) {
								if($datacek1p['count']==$waktu) {
									$waktup = $datacek1p['count'];
									break;
								}
							}
							if($waktup==$waktu) {
								echo '<script language="javascript">alert("Absen Sudah Digantikan"); document.location="index.php";</script>';
							}
							elseif($waktup!=$waktu) {
								$query = $koneksi->query("INSERT INTO absen VALUES('$id_absen','$username','$tgl','$jam','$status_absen','$waktu')");
								$gaji = $koneksi->query("INSERT INTO data_gaji VALUES('$id_gaji','$username','$tgl','$nama_sekolah')");
								$tes = $koneksi->query("SELECT DISTINCT data_gaji.nama_sekolah,gaji.nominal FROM data_gaji NATURAL JOIN jadwal NATURAL JOIN gaji WHERE data_gaji.nip='$username'");
								if($tes) {
									while($tesgaji=$tes->fetch()) {
										if($nama_sekolah==$tesgaji['nama_sekolah']) {
											$uang=$tesgaji['nominal'];
											break;
										}
									}
								}
								$inputgaji = $koneksi->query("INSERT INTO gaji_pegawai VALUES('$username','$nama_sekolah','$bln','$thn',1,'$uang')");
								echo '<script language="javascript">alert("Absen Berhasil"); document.location="index.php";</script>';
							}
						}
					}
				}
				elseif($cek1->rowcount()>0) {
					while($datacek1=$cek1->fetch()) {
						$cekwaktu=date_create($datacek1['count']);
						$cekwaktu=date_format($cekwaktu,'H:i:s');
						if($waktu==$cekwaktu) {
							break;
						}
					}
					if($waktu==$cekwaktu) {
						echo '<script language="javascript">alert("Anda Sudah Melakukan Absen"); document.location="index.php";</script>';
					}
					elseif($waktu!=$cekwaktu) {
						$query = $koneksi->query("INSERT INTO absen VALUES('$id_absen','$username','$tgl','$jam','$status_absen','$waktu')");
						$gaji = $koneksi->query("INSERT INTO data_gaji VALUES('$id_gaji','$username','$tgl','$nama_sekolah')");
						$tes = $koneksi->query("SELECT DISTINCT data_gaji.nama_sekolah,gaji.nominal FROM data_gaji NATURAL JOIN jadwal NATURAL JOIN gaji WHERE data_gaji.nip='$username'");
						if($tes) {
							while($tesgaji=$tes->fetch()) {
								if($nama_sekolah==$tesgaji['nama_sekolah']) {
									$uang=$tesgaji['nominal'];
									break;
								}
							}
						}
						$inputgaji = $koneksi->query("INSERT INTO gaji_pegawai VALUES('$username','$nama_sekolah','$bln','$thn',1,'$uang')");
						echo '<script language="javascript">alert("Absen Berhasil"); document.location="index.php";</script>';
					}
				}
			}
			else{
				echo '<script language="javascript">alert("Absen Gagal, Silakan Cek Jadwal Anda"); document.location="index.php";</script>';
			}
		}
	}
?>