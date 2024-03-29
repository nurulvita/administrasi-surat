<?php 
    include '../../../config/koneksi.php';
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $id = $_POST['id'];
        $status = 'acc';

        $sql = "UPDATE surat_keluar SET status='$status' WHERE id = '$id'";

        if(mysqli_query($con, $sql)) {
            echo "<script>alert('Surat Berhasil Di Setujui!');
                window.location.href='../suratacc.php?id=".$id."';
                </script>";
        } else {
            echo "<script>alert('Gagal Mengarsip Surat!');</script>".mysqli_error($con);
        }
    }
?>
