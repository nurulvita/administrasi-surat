<?php
session_start();
include_once('../../config/koneksi.php');

if (isset($_COOKIE['ingatSaya'])) {
  $_SESSION['login'] = true;
}

if (!isset($_SESSION['email'])) {
    header('location: ../../index.php');
    exit();
}

$_SESSION['nama'];
$_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../role/admin/admin-header.php'; ;?>

    

</head>

<body>

<div class="container container-fluid">
    <div class="wrapper">
        <div class="main-panel pt-4">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-2">
                        <div class="row">
                            <!-- Kolom untuk gambar home -->
                            <div class="col-md-6">
                                <img src="../../assets/img/sm.png" alt="" class="img-fluid" style="height: 65vh;">
                            </div>
                            <!-- Kolom untuk pesan welcome -->
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

                <!----------------- Surat Masuk ----------------->
                <?php
                        include '../../config/koneksi.php';

                        $count_query = "SELECT COUNT(*) AS total FROM surat_masuk";
                        $count_result = mysqli_query($con, $count_query);
                        $count_row = mysqli_fetch_assoc($count_result);
                        $total_records = $count_row['total'];
                        ?>
                <div class="row pt-4">
                    <div class="col-md-4">
                        <div class="card card-surat-masuk">
                            <div class="card-header">
                                <h4 class="card-title" style="color: white;">Surat Masuk</h4>
                            </div>
                            <div class="card-body text-center">
                                <a href="../admin/suratmasuk.php">
                                <img clas="img img-fluid" src="../../assets/img/in.png" alt="" style="height: 15vh;">
                                </a>
                                <h2><strong>Surat Masuk: <?php echo $total_records; ?></strong></h2>
                            </div>
                        </div>
                    </div>


                    <!---------------- Surat Keluar ------------->
                <?php
                include '../../config/koneksi.php';

                $count_query = "SELECT COUNT(*) AS total FROM surat_keluar WHERE status = 'acc'";
                $count_result = mysqli_query($con, $count_query);
                $count_row = mysqli_fetch_assoc($count_result);
                $total_records = $count_row['total'];
                ?>
                <div class="col-md-4">
                        <div class="card card-surat-keluar">
                            <div class="card-header">
                                <h4 class="card-title" style="color: white;">Surat Keluar</h4>
                            </div>
                            <div class="card-body text-center">
                                <a href="../admin/suratkeluar.php">
                                <img class="img img-fluid" src="../../assets/img/out.png" alt="" style="height: 15vh;">
                                </a>
                                <h2><strong>Surat Keluar: <?php echo $total_records; ?></strong></h2>
                            </div>
                        </div>      
                </div>

                <!------------ Persetujuan Surat ------------>
                <?php
                include '../../config/koneksi.php';

                $count_query = "SELECT COUNT(*) AS total FROM surat_keluar WHERE status = 'pending'";
                $count_result = mysqli_query($con, $count_query);
                $count_row = mysqli_fetch_assoc($count_result);
                $total_records = $count_row['total'];
                ?>

                <div class="col-md-4">
                        <div class="card card-surat-acc">
                            <div class="card-header">
                                <h4 class="card-title" style="color: white;">Menunggu Persetujuan</h4>
                            </div>
                            <div class="card-body text-center">
                                <a href="../admin/suratacc.php">
                                <img class="img img-fluid" src="../../assets/img/acc.png" alt="" style="height: 15vh;">
                                </a>
                                <h2><strong>Menunggu Persetujuan: <?php echo $total_records; ?></strong></h2>
                            </div>
                        </div>
                </div>

            </div>

        </div>
        </div>
    </div>
    <!-- <img src="../../assets/img/bg2.jpg" class="img-fluid img-background" alt=""> -->
    <script src="../../assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
