<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_aduan'])) {
   $id_aduan = $_GET['id_aduan'];
   $delete_aduan = mysqli_query($conn, "DELETE FROM aduan WHERE id_aduan = '$id_aduan'");
   if($delete_aduan){
      echo "<script>window.location='aduan.php'</script>";
   }
}
if (isset($_GET['id_seksi'])) {
   $id_seksi = $_GET['id_seksi'];
   $delete_seksi = mysqli_query($conn, "DELETE FROM seksi WHERE id_seksi = '$id_seksi'");
   if($delete_seksi){
      echo "<script>window.location='seksi.php'</script>";
   }
}
if (isset($_GET['id_kategori'])) {
   $id_kategori = $_GET['id_kategori'];
   $delete_kategori = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");
   if($delete_kategori){
      echo "<script>window.location='kategori.php'</script>";
   }
}
if (isset($_GET['id_petugas'])) {
   $id_petugas = $_GET['id_petugas'];
   $delete_tujuan_aduan = mysqli_query($conn, "DELETE FROM tujuan_aduan WHERE id_petugas = '$id_petugas'");
   if($delete_tujuan_aduan){
      echo "<script>window.location='petugas.php'</script>";
   }
}
?>
