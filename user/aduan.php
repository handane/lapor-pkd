<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["user"])) {
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
    .overlay {
    display: none;
    position: fixed;
    z-index: 999;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    overflow: auto;
  }

  .overlay-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 800px;
  }

  .overlay img {
    display: block;
    width: 100%;
    height: auto;
    margin: auto;
  }

  .closebtn {
    color: white;
    position: absolute;
    top: 15px;
    right: 35px;
    font-size: 40px;
    cursor: pointer;
  }
  </style>
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
          <a href="./tambah-pengaduan.php" class="btn btn-primary mb-3">Buat Pengaduan</a>
          <div class="card">
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr style="font-size: 16px;">
                    <th>No</th>
                    <th>Sifat Aduan</th>
                    <th>Nama</th>
                    <th>Petugas Tujuan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Isi Pengaduan</th>
                    <th>Kategori</th>
                    <th>Lampiran Gambar</th>
                    <th>Balasan</th>
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
                      <td><?php echo $p['isi_aduan']; ?></td>
                      <td><?php echo $p['kategori_aduan']; ?></td>
                      <td><img src="./foto/<?php echo $p['gambar']; ?>" height="80px" alt="" onClick="openOverlay(this)"></td>
                      <td><?php echo $p['balasan']; ?></td>
                      <td>
                        <!-- <a class="btn btn-sm btn-success" href="aduan-edit.php?id_aduan=<?php echo $p['id_aduan'] ?>">Edit</a> -->
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
  <script>
  // Fungsi untuk membuka overlay dengan gambar yang diperbesar
  function openOverlay(img) {
    var overlay = document.getElementById("overlay");
    var imgOverlay = document.getElementById("img-overlay");

    // Set gambar pada overlay
    imgOverlay.src = img.src;

    // Tampilkan overlay
    overlay.style.display = "block";
  }

  // Fungsi untuk menutup overlay
  function closeOverlay() {
    document.getElementById("overlay").style.display = "none";
  }
</script>

</body>

</html>