<?php
  include 'koneksi.php';
  include 'akses.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/content.css">
  <script src="assets/js/script.js"></script>
  <script src="assets/js/datatable1.js"></script>
  <script src="assets/js/datatable2.js"></script>
  <title>Jadwal Mengajar</title>
</head>
<body>
  <div class="header">
    <h2 align="center">Data Jadwal Mengajar</h2>
    <h5 style="float: left;"><a href="tambah_jadwal.php">Tambah Jadwal</a></h5>
    <h5 style="float: right;"><a href="index.php"> < Kembali </a></h5>
  </div>
  <div style="padding-left:20px">
    <table id="example" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>NO</th>
          <th>ID Jadwal</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Nama Sekolah</th>
          <th>Hari</th>
          <th>Pukul</th>
          <th><center>Gaji(Rp)</center></th>
          <th><center>Perubahan</center></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = $koneksi->query("SELECT jadwal.id_jadwal,jadwal.nip,pegawai.nama,jadwal.nama_sekolah,jadwal.hari,jadwal.jam,gaji.nominal FROM jadwal JOIN pegawai ON jadwal.nip=pegawai.nip JOIN gaji ON jadwal.golongan=gaji.golongan ORDER BY id_jadwal ASC");
        if($query->rowcount()>0){
          $no = 1;
          while($data = $query->fetch()){
            echo'<tr>';
            echo"<td><center>$no.</center></td>";
            echo'<td>'.$data['id_jadwal'].'</td>';
            echo'<td>'.$data['nip'].'</td>';
            echo'<td>'.$data['nama'].'</td>';
            echo'<td>'.$data['nama_sekolah'].'</td>';
            echo'<td>'.$data['hari'].'</td>';
            echo'<td>'.$data['jam'].'</td>';
            echo'<td><center>'.$data['nominal'].'</center></td>';
            echo'<td><center><a href="update_jadwal.php?id_jadwal='.$data['id_jadwal'].'"onclick="return confirm(\'Yakin?\')">Ubah</a> | <a href="hapus_jadwal.php?id_jadwal='.$data['id_jadwal'].'"onclick="return confirm(\'Yakin?\')">Hapus</a></center></td>';
            echo'</tr>';
            $no++;
          }
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>NO</th>
          <th>ID Jadwal</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Nama Sekolah</th>
          <th>Hari</th>
          <th>Pukul</th>
          <th><center>Gaji(Rp)</center></th>
          <th><center>Perubahan</center></th>
        </tr>
      </tfoot>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</html>