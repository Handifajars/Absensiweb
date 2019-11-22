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
  <title>Daftar Pegawai</title>
</head>
<body>
  <div class="header">
    <h2 align="center">Daftar Pegawai</h2>
    <h5 style="float: right;"><a href="index.php"> < Kembali </a></h5>
  </div>
  <div style="padding-left:20px">
    <table id="example" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>NO</th>
          <th>NIP</th>
          <th>Nama</th>
          <th><center>Jenis Kelamin</center></th>
          <th>Nomor HP</th>
          <th><center>Status Pegawai</center></th>
          <th><center>Password</center></th>
          <th><center>Perubahan</center></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = $koneksi->query("SELECT nip,nama,jenis_kelamin,no_hp,status_pegawai FROM pegawai ORDER BY nip ASC");
        if($query->rowcount()>0){
          $no = 1;
          while($data = $query->fetch()){
            echo'<tr>';
            echo"<td><center>$no.</center></td>";
            echo'<td>'.$data['nip'].'</td>';
            echo'<td>'.$data['nama'].'</td>';
            echo'<td><center>'.$data['jenis_kelamin'].'</center></td>';
            echo'<td>'.$data['no_hp'].'</td>';
            echo'<td><center>'.$data['status_pegawai'].'</center></td>';
            echo'<td><center><a href="ubah_password_pegawai.php?nip='.$data['nip'].'"onclick="return confirm(\'Yakin?\')">Reset</a></td>';
            echo'<td><center><a href="update_pegawai.php?nip='.$data['nip'].'"onclick="return confirm(\'Yakin?\')">Ubah</a> | <a href="hapus_pegawai.php?nip='.$data['nip'].'"onclick="return confirm(\'Yakin?\')">Hapus</a></center></td>';
            echo'</tr>';
            $no++;
          }
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>NO</th>
          <th>NIP</th>
          <th>Nama</th>
          <th><center>Jenis Kelamin</center></th>
          <th>Nomor HP</th>
          <th><center>Status Pegawai</center></th>
          <th><center>Password</center></th>
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