<?php

	include 'koneksi.php';
	include 'akses.php';

	date_default_timezone_set('Asia/Jakarta');
	$username = $_SESSION['username'];
	$id_absen = uniqid();
	$id_gaji = uniqid();
	$nip_pengganti = $_SESSION['nip_pengganti'];
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

	$cek1 = $koneksi->query("SELECT * FROM absen WHERE nip='$nip_pengganti' AND tgl='$tgl'");
	$cek2 = $koneksi->query("SELECT jadwal.nama_sekolah, jadwal.hari, jadwal.jam FROM jadwal INNER JOIN pegawai ON jadwal.nip=pegawai.nip AND jadwal.nip='$nip_pengganti' AND jadwal.hari='$dayList[$day]'");
	if ($cek2) {
		if($cek2->rowcount()==0) {
			echo '<script language="javascript">alert("Tidak Ada Absen Hari ini"); document.location="index.php";</script>';
		}
		elseif($cek2->rowcount()>0) {
			while($datacek2 = $cek2->fetch()){
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
					break;
				}
			}
			if($jam>=$selisih && $jam<=$waktu) {
				$cek1p = $koneksi->query("SELECT * FROM absen WHERE status_masuk='Menggantikan $nip_pengganti' AND tgl='$tgl'");
				if($cek1->rowcount()==0 && $cek1p->rowcount()==0) {
					$query = $koneksi->query("INSERT INTO absen VALUES('$id_absen','$username','$tgl','$jam','Menggantikan $nip_pengganti','$waktu')");
					$gaji = $koneksi->query( "INSERT INTO data_gaji VALUES('$id_gaji','$username','$tgl','$nama_sekolah')");
					$tes = $koneksi->query( "SELECT DISTINCT nama_sekolah FROM data_gaji WHERE nip='$username'");
					$tesp =  $koneksi->query("SELECT nama_sekolah,golongan FROM jadwal WHERE nip='$nip_pengganti'");
					if($tes && $tesp) {
						while($tesgaji = $tes->fetch()) {
							if($nama_sekolah==$tesgaji['nama_sekolah']) {
								$nama_sekolah1=$nama_sekolah;
								break;
							}
						}
						while($tesgajip = $tesp->fetch()) {
							if($nama_sekolah==$tesgajip['nama_sekolah']) {
								$nama_sekolah2=$nama_sekolah;
								break;
							}
						}
						if($nama_sekolah1==$nama_sekolah2) {
							$gajip = $koneksi->query("SELECT DISTINCT jadwal.nama_sekolah,gaji.nominal FROM jadwal NATURAL JOIN gaji WHERE jadwal.nip='$nip_pengganti'");
							while($datagaji = $gajip->fetch()) {
								if($nama_sekolah==$datagaji['nama_sekolah']) {
									$uang = $datagaji['nominal'];
									break;
								}
							}
						}
					}
					$inputgaji = $koneksi->query("INSERT INTO gaji_pegawai VALUES('$username','$nama_sekolah','$bln','$thn',1,'$uang')");
					echo '<script language="javascript">alert("Absen Berhasil"); document.location="index.php";</script>';
				}
				elseif($cek1p->rowcount()>0){
					if($cek1->rowcount()==0) {
						while($datacek1p = $cek1p->fetch()) {
							$cekwaktup=date_create($datacek1p['count']);
							$cekwaktup=date_format($cekwaktup,'H:i:s');
							if($waktu==$cekwaktup) {
								break;
							}
						}
						if($waktu==$cekwaktup) {
							echo '<script language="javascript">alert("Absen Sudah Digantikan"); document.location="index.php";</script>';
						}
						elseif($waktu!=$cekwaktup) {
							$query = $koneksi->query("INSERT INTO absen VALUES('$id_absen','$username','$tgl','$jam','Menggantikan $nip_pengganti','$waktu')");
							$gaji = $koneksi->query("INSERT INTO data_gaji VALUES('$id_gaji','$username','$tgl','$nama_sekolah')");
							$tes = $koneksi->query("SELECT DISTINCT nama_sekolah FROM data_gaji WHERE nip='$username'");
							$tesp =  $koneksi->query("SELECT nama_sekolah,golongan FROM jadwal WHERE nip='$nip_pengganti'");
							if($tes && $tesp) {
								while($tesgaji = $tes->fetch()) {
									if($nama_sekolah==$tesgaji['nama_sekolah']) {
										$nama_sekolah1=$nama_sekolah;
										break;
									}
								}
								while($tesgajip = $tesp->fetch()) {
									if($nama_sekolah==$tesgajip['nama_sekolah']) {
										$nama_sekolah2=$nama_sekolah;
										break;
									}
								}
								if($nama_sekolah1==$nama_sekolah2) {
									$gajip = $koneksi->query("SELECT DISTINCT jadwal.nama_sekolah,gaji.nominal FROM jadwal NATURAL JOIN gaji WHERE jadwal.nip='$nip_pengganti'");
									while($datagaji = $gajip->fetch()) {
										if($nama_sekolah==$datagaji['nama_sekolah']) {
											$uang = $datagaji['nominal'];
											break;
										}
									}
								}
							}
							$inputgaji = $koneksi->query("INSERT INTO gaji_pegawai VALUES('$username','$nama_sekolah','$bln','$thn',1,'$uang')");
							echo '<script language="javascript">alert("Absen Berhasil"); document.location="index.php";</script>';
						}
					}
					elseif($cek1->rowcount()!=0) {
						while($datacek1 = $cek1->fetch()) {
							$cekwaktu=date_create($datacek1['count']);
							$cekwaktu=date_format($cekwaktu,'H:i:s');
							if($waktu==$cekwaktu) {
								break;
							}
						}
						if($waktu==$cekwaktu) {
							echo '<script language="javascript">alert("Absen Telah Dilakukan Oleh Pemilik Jadwal"); document.location="index.php";</script>';
						}
						elseif($waktu!=$cekwaktu) {
							while($datacek1p = $cek1p->fetch()) {
								$cekwaktup=date_create($datacek1p['count']);
								$cekwaktup=date_format($cekwaktup,'H:i:s');
								if($waktu==$cekwaktup) {
									break;
								}
							}
							if($waktu==$cekwaktup) {
								echo '<script language="javascript">alert("Absen Sudah Digantikan"); document.location="index.php";</script>';
							}
							elseif($waktu!=$cekwaktup) {
								$query = $koneksi->query("INSERT INTO absen VALUES('$id_absen','$username','$tgl','$jam','Menggantikan $nip_pengganti','$waktu')");
								$gaji = $koneksi->query("INSERT INTO data_gaji VALUES('$id_gaji','$username','$tgl','$nama_sekolah')");
								$tes = $koneksi->query("SELECT DISTINCT nama_sekolah FROM data_gaji WHERE nip='$username'");
								$tesp =  $koneksi->query("SELECT nama_sekolah,golongan FROM jadwal WHERE nip='$nip_pengganti'");
								if($tes && $tesp) {
									while($tesgaji = $tes->fetch()) {
										if($nama_sekolah==$tesgaji['nama_sekolah']) {
											$nama_sekolah1=$nama_sekolah;
											break;
										}
									}
									while($tesgajip = $tesp->fetch()) {
										if($nama_sekolah==$tesgajip['nama_sekolah']) {
											$nama_sekolah2=$nama_sekolah;
											break;
										}
									}
									if($nama_sekolah1==$nama_sekolah2) {
										$gajip = $koneksi->query("SELECT DISTINCT jadwal.nama_sekolah,gaji.nominal FROM jadwal NATURAL JOIN gaji WHERE jadwal.nip='$nip_pengganti'");
										while($datagaji = $gajip->fetch()) {
											if($nama_sekolah==$datagaji['nama_sekolah']) {
												$uang = $datagaji['nominal'];
												break;
											}
										}
									}
								}
								$inputgaji =$koneksi->query("INSERT INTO gaji_pegawai VALUES('$username','$nama_sekolah','$bln','$thn',1,'$uang')");
								echo '<script language="javascript">alert("Absen Berhasil"); document.location="index.php";</script>';
							}
						}
					}
				}
				elseif($cek1->rowcount()>0) {
					while($datacek1 = $cek1->fetch()) {
						$cekwaktu=date_create($datacek1['count']);
						$cekwaktu=date_format($cekwaktu,'H:i:s');
						if($waktu==$cekwaktu) {
							break;
						}
					}
					if($waktu==$cekwaktu) {
						echo '<script language="javascript">alert("Absen Telah Dilakukan Oleh Pemilik Jadwal"); document.location="index.php";</script>';
					}
					elseif($waktu!=$cekwaktu) {
						$query = $koneksi->query( "INSERT INTO absen VALUES('$id_absen','$username','$tgl','$jam','Menggantikan $nip_pengganti','$waktu')");
						$gaji = $koneksi->query( "INSERT INTO data_gaji VALUES('$id_gaji','$username','$tgl','$nama_sekolah')");
						$tes = $koneksi->query( "SELECT DISTINCT nama_sekolah FROM data_gaji WHERE nip='$username'");
						$tesp =  $koneksi->query( "SELECT nama_sekolah,golongan FROM jadwal WHERE nip='$nip_pengganti'");
						if($tes && $tesp) {
							while($tesgaji = $tes->fetch()) {
								if($nama_sekolah==$tesgaji['nama_sekolah']) {
									$nama_sekolah1=$nama_sekolah;
									break;
								}
							}
							while($tesgajip = $tesp->fetch()) {
								if($nama_sekolah==$tesgajip['nama_sekolah']) {
									$nama_sekolah2=$nama_sekolah;
									break;
								}
							}
							if($nama_sekolah1==$nama_sekolah2) {
								$gajip = $koneksi->query( "SELECT DISTINCT jadwal.nama_sekolah,gaji.nominal FROM jadwal NATURAL JOIN gaji WHERE jadwal.nip='$nip_pengganti'");
								while($datagaji = $gajip->fetch()) {
									if($nama_sekolah==$datagaji['nama_sekolah']) {
										$uang = $datagaji['nominal'];
										break;
									}
								}
							}
						}
						$inputgaji = $koneksi->query( "INSERT INTO gaji_pegawai VALUES('$username','$nama_sekolah','$bln','$thn',1,'$uang')");
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