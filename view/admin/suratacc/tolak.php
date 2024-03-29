<?php 
    include '../../../config/koneksi.php';
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $id = $_POST['id'];
        $status = 'tolak';

        $sql = "UPDATE surat_keluar SET status='$status' WHERE id = '$id'";

        if(mysqli_query($con, $sql)) {
            echo "<script>alert('Surat Berhasil di Tolak!');
                window.location.href='../suratacc.php?id=".$id."';
                </script>";
        } else {
            echo "<script>alert('Gagal Menolak Surat!');</script>".mysqli_error($con);
        }
    }
?>
