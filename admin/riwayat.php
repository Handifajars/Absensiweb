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
  <title>Riwayat Absensi</title>
</head>
<body>
  <div class="header">
    <h2 align="center">Riwayat Absensi</h2>
    <h5 style="float: right;"><a href="index.php"> < Kembali </a></h5>
  </div>
  <div style="padding-left:20px">
    <table id="example" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID Absen</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Jam Masuk</th>
          <th>Status Masuk</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = $koneksi->query("SELECT absen.id_absen,absen.nip,pegawai.nama,absen.tgl,absen.jam_masuk,absen.status_masuk FROM absen JOIN pegawai ON absen.nip=pegawai.nip ORDER BY tgl ASC");
        if($query->rowcount()>0){
          $no = 1;
          while($data = $query->fetch()){
              echo'<tr>';
                echo'<td>'.$data['id_absen'].'</td>';
                echo'<td>'.$data['nip'].'</td>';
                echo'<td>'.$data['nama'].'</td>';
                echo'<td>'.$data['tgl'].'</td>';
                echo'<td>'.$data['jam_masuk'].'</td>';
                echo'<td>'.$data['status_masuk'].'</td>';
              echo'</tr>';
              $no++;
            }
          }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ID Absen</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Jam Masuk</th>
          <th>Status Masuk</th>
        </tr>
      </tfoot>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</html>