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
          <div class="row">
          <div class="col-md-6">
            <?php
              $edit = mysqli_query($conn, "SELECT * FROM seksi");
              $row = mysqli_fetch_array($edit);
            ?>
            <div class="card card-body">
                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                      <div class="col-md-4 card card-body">
                        <label for="" class="form-label-md"><b>Tambah Seksi</b></label>
                        <input type="text" class="form-control" name="seksi"/>
                        <input type="submit" class="btn btn-success mt-4" name="submit" value="Tambah" />
                      </div>
                    </form>

              <?php
                  //   batas
                  if (isset($_POST['submit'])) {
                     $seksi = $_POST['seksi'];
                     $get_regist = mysqli_query($conn, "INSERT INTO seksi VALUE(
                        null,
                        '" . $seksi . "'
                  )");
                     if ($get_regist) {
                        echo
                        '<script>
                        window.location="seksi.php";
                        alert("data berhasil di update");
                        </script>';
                     } else {
                        echo 'gagal ' . mysqli_error($conn);
                     }
                  }
              ?>
            </div>
          </div>
          <!-- batas -->
          <div class="col-md-6">
            <div class="card card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr style="font-size: 16px;">
                    <th>No</th>
                    <th>Seksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $get_paket = mysqli_query($conn, "SELECT * FROM seksi");
                  while ($p = mysqli_fetch_array($get_paket)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['seksi'] ?></td>
                      <td>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="delete.php?id_seksi=<?php echo $p['id_seksi'] ?>">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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