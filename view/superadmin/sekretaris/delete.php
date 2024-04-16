<?php
include '../../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE id = '$id'"; // Mengganti nama tabel menjadi user_surat_keluar
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Berhasil Menghapus Data Sekretaris!');
        window.location.href='../sekretaris.php';
        </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data Sekretaris!');</script>" . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
