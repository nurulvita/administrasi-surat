<?php
session_start();
include_once('../../../config/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $keterangan = $_POST['keterangan']; // Mengambil alasan penolakan dari form

    // Simpan keterangan penolakan ke dalam sesi
    $_SESSION['keterangan'] = $keterangan;

    // Contoh proses update status dan penyimpanan keterangan penolakan di database
    $query = "UPDATE surat_keluar SET status='ditolak', keterangan='$keterangan' WHERE id=$id";

    if (mysqli_query($con, $query)) {
        // Jika berhasil, redirect kembali ke halaman sebelumnya atau halaman yang diinginkan
        header("location: ../suratacc.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat memproses penolakan surat.";
    }
} else {
    // Jika halaman diakses secara langsung, redirect ke halaman yang sesuai
    header("location: ../../../index.php");
    exit();
}
?>
