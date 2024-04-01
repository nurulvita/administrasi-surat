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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../role/admin/admin-header.php'; ;?>

</head>

<body>
        <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    <div class="container container-fluid">
    <div class="wrapper">
        <div class="main-panel pt-4">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                    <h3 class="text-white pb-2 fw-bold">Welcome, <span style="color: yellow; font-size: 24px;"><?=$_SESSION['nama'];?></span></h3>
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">Arsip Surat INFORSA</h2>
                                <!-- <h5 class="text-white op-7 mb-2">Berikut ini adalah surat-surat yang telah terbit dam
                                    diarsipkan Klik "Lihat" pada kolom aksi untuk menampilkan surat</h5> -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
