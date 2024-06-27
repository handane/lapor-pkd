<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./include/meta.php') ?>
  
  <style>
    #ftz16 {
      font-size: 16px;
    }

    body {
      background-color: #f1f1f1;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <?php include('./include/nav.php') ?>
  
  <div id="layoutSidenav">
    <?php include('./include/sidenav.php') ?>
    
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-3">
          <ol class="breadcrumb mb-4 mt-2">
            <li class="breadcrumb-item active">Data Pengaduan</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr style="font-size: 16px;">
                    <th>No</th>
                    <th>Sifat Aduan</th>
                    <th>Nama Pelapor</th>
                    <th>Petugas Tujuan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $get_paket = mysqli_query($conn, "SELECT * FROM aduan");
                  $jumlah_aduan = mysqli_num_rows($get_paket);
                  while ($p = mysqli_fetch_array($get_paket)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['sifat_aduan']; ?></td>
                      <td><?php echo $p['nama_pelapor']; ?></td>
                      <td><?php echo $p['petugas']; ?></td>
                      <td><?php echo $p['tanggal_pengaduan']; ?></td>
                      <td><?php echo $p['kategori_aduan']; ?></td>
                      <td><?php echo $p['status']; ?></td>
                      <td>
                        <a class="btn btn-sm btn-primary" href="detail.php?id_aduan=<?php echo $p['id_aduan'] ?>">Detail</a>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="delete.php?id_aduan=<?php echo $p['id_aduan'] ?>">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div id="overlay" class="overlay" onClick="closeOverlay()">
                <span class="closebtn">&times;</span>
                <div class="overlay-content">
                  <img id="img-overlay" src="" alt="">
                </div>
              </div>
            </div>
          </div>
      </main>
      <footer class="mt-5">
      </footer>
    </div>
  </div>
  <script src="../js/scripts.js"></script>
  <script src="../datatables/datatable.js"></script>
  <script src="../js/datatables-simple-demo.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>