<?php
session_start();
include_once('../../config/koneksi.php');

if (!isset($_SESSION['email'])) {
    header('location:../../index.php');
    exit();
}

$_SESSION['nama'];
$_SESSION['email'];

// Menghitung jumlah sekretaris dari tabel user
$count_query_sekretaris = "SELECT COUNT(*) AS total FROM `user` WHERE `jabatan` IN ('sekretaris departemen', 'sekretaris panitia', 'sekretaris divisi')";
$count_result_sekretaris = mysqli_query($con, $count_query_sekretaris);
$count_row_sekretaris = mysqli_fetch_assoc($count_result_sekretaris);
$total_sekretaris = $count_row_sekretaris['total'];

$count_query_persetujuan_surat = "SELECT COUNT(*) AS total FROM surat_keluar WHERE status = 'pending'";
$count_result_persetujuan_surat = mysqli_query($con, $count_query_persetujuan_surat);
$count_row_persetujuan_surat = mysqli_fetch_assoc($count_result_persetujuan_surat);
$total_persetujuan_surat = $count_row_persetujuan_surat['total'];

$count_query_surat_keluar = "SELECT COUNT(*) AS total FROM surat_keluar WHERE status = 'acc'";
$count_result_surat_keluar = mysqli_query($con, $count_query_surat_keluar);
$count_row_surat_keluar = mysqli_fetch_assoc($count_result_surat_keluar);
$total_surat_keluar = $count_row_surat_keluar['total'];

$count_query_surat_masuk = "SELECT COUNT(*) AS total FROM surat_masuk";
$count_result_surat_masuk = mysqli_query($con, $count_query_surat_masuk);
$count_row_surat_masuk = mysqli_fetch_assoc($count_result_surat_masuk);
$total_surat_masuk = $count_row_surat_masuk['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../role/superadmin/admin-header.php'; ;?>
    <style>
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Gradasi warna untuk setiap kartu */
        .card-surat-masuk {
            background: linear-gradient(135deg, #039BE5, #4A148C);
        }

        .card-surat-keluar {
            background: linear-gradient(135deg, #039BE5, #01579B);
        }

        .card-surat-acc {
            background: linear-gradient(135deg, #039BE5, #2E7D32);
        }

        .card-jumlah-sekretaris {
            background: linear-gradient(135deg, #43A047, #1B5E20);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            color: #fff;
            font-weight: bold;
            font-size: 18px;
        }

        .card-text {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px;
        }

        .img-fluid {
            height: 10vh;
        }
    </style>
</head>

<body>

    <div class="container container-fluid">
        <div class="wrapper">
            <div class="main-panel pt-4">
                <div class="content">
                    <div class="panel-header bg-primary-gradient">
                        <div class="page-inner py-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../assets/img/sm.png" alt="" class="img-fluid" style="height: 65vh;">
                                </div>
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <h3 class="text-white pb-2 fw-bold" style="font-size: 50px;">Selamat Datang, <br><span style="color: yellow; font-size:50px;"><?=$_SESSION['nama'];?></span></h3>
                                        <h2 class="text-white pb-2 fw-bold">Arsip Surat</h2>
                                        <h5 class="text-white op-7 mb-2">INFORSArchive adalah pendataan surat masuk dan keluar pada Information System Association</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <!-- Surat Masuk -->
                        <div class="col-md-3">
                            <div class="card card-surat-masuk">
                                <div class="card-body">
                                    <h4 class="card-title">Surat Masuk</h4>
                                    <p class="card-text"><?php echo $total_surat_masuk; ?></p>
                                    <img src="../../assets/img/in.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <!-- Surat Keluar -->
                        <div class="col-md-3">
                            <div class="card card-surat-keluar">
                                <div class="card-body">
                                    <h4 class="card-title">Surat Keluar</h4>
                                    <p class="card-text"><?php echo $total_surat_keluar; ?></p>
                                    <img src="../../assets/img/out.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <!-- Menunggu Persetujuan -->
                        <div class="col-md-3">
                            <div class="card card-surat-acc">
                                <div class="card-body">
                                    <h4 class="card-title">Menunggu Persetujuan</h4>
                                    <p class="card-text"><?php echo $total_persetujuan_surat; ?></p>
                                    <img src="../../assets/img/acc.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Sekretaris -->
                        <div class="col-md-3">
                            <div class="card card-jumlah-sekretaris">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah Sekretaris</h4>
                                    <p class="card-text"><?php echo $total_sekretaris; ?></p>
                                    <img src="../../assets/img/iconsekre.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
