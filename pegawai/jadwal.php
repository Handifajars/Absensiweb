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
  <title>Jadwal Mengajar</title>
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
                  <h2 style="text-align: center;">Jadwal Mengajar</h2>
                  <h5 style="text-align: right;"><a href="index.php"> < Kembali </a></h5>
               </div>
  <div class="card-body">
                  <div class="row">
                  </div>
  <div class="table-responsive">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Berdasarkan Hari" title="Type in a name">
  <table id="myTable">
    <th>NO</th>
    <th>Nama Sekolah</th>
    <th>Hari</th>
    <th>Pukul</th>

    <?php
$username = $_SESSION['username'];
$query = $koneksi->query( "SELECT jadwal.nama_sekolah, jadwal.hari, jadwal.jam FROM jadwal INNER JOIN pegawai ON jadwal.nip=pegawai.nip AND jadwal.nip='$username'");
if($query->rowcount()>0){
    $no = 1;
    while($data = $query->fetch()){
        echo'<tr>';
            echo"<td>$no.</td>";
            echo'<td>'.$data['nama_sekolah'].'</td>';
            echo'<td>'.$data['hari'].'</td>';
            echo'<td>'.$data['jam'].'</td>';
        echo'</tr>';
        $no++;
    }
}
?>
    </table>
<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } 
        else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>
</div>
</body>
</html>