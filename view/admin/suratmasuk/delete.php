<?php
include '../../../config/koneksi.php';

if($_SERVER['REQUEST_METHOD']=='GET') {

  $id = $_GET['id'];

  $sql = "DELETE FROM surat_masuk WHERE id = '$id'";
  if(mysqli_query($con,$sql)) {
    echo "<script>alert('Berhasil Menghapus Surat!');
    window.location.href='../index.php';
    </script>";
  } else {
    echo "<script>alert('Gagal Menghapus Surat!');</script>".mysqli_error($con);
  }
  mysqli_close($con);
}