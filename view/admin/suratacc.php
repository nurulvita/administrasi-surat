<?php
session_start();
include_once('../../config/koneksi.php');

if (!isset($_SESSION['email'])) {
    header('location: ../../index.php');
    exit();
}

$email = $_SESSION['email'];
$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);
$_SESSION['username'] = $row['username'];
$_SESSION['nama'] = $row['nama'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../role/admin/admin-header.php'; ?>

</head>

<body>
    <div class="container container-fluid">
    <div class="wrapper">
        <div class="main-panel pt-4">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">Daftar Permintaan Upload Surat Keluar</h2>
                                <h5 class="text-white op-7 mb-2">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. Klik "Lihat" pada kolom aksi untuk menampilkan surat</h5>
                            </div>
                        </div>
                        <div class="collapse" id="search-nav">
                            <form method="GET" action="index.php" style="text-align: center;" class="navbar-left navbar-form nav-search mr-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="submit" class="btn btn-search pr-1">
                                            <i class="bx bx-search search-icon" onclick="myFunction()"></i>
                                        </button>
                                    </div>
                                    <input type="text" placeholder="Cari Surat" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="page-inner mt--5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Arsip Surat Keluar</h4>

                                </div>
                            </div>
                            <div class="container container-fluid">
                                <div class="card-body">
                                    <!-- Modal -->
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nomor Surat</th>
                                                    <th scope="col">Kategori</th>
                                                    <th scope="col">Tujuan</th>
                                                    <th scope="col">Perihal</th>
                                                    <th scope="col">Tanggal Keluar</th>
                                                    <th scope="col">Waktu Pengarsipan</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                include_once '../../config/koneksi.php';
                                                    // Menentukan halaman saat ini
                                                    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

                                                    // Jumlah data yang ingin ditampilkan per halaman
                                                    $limit = 2;

                                                    // Query untuk menghitung jumlah total data
                                                    $count_query = "SELECT COUNT(*) AS total FROM surat_keluar WHERE status = 'pending'";
                                                    $count_result = mysqli_query($con, $count_query);
                                                    $count_row = mysqli_fetch_assoc($count_result);
                                                    $total_records = $count_row['total'];

                                                    // Hitung jumlah total halaman
                                                    $total_pages = ceil($total_records / $limit);

                                                    // Hitung offset untuk query database
                                                    $offset = ($page - 1) * $limit;

                                                    // Query untuk menampilkan data sesuai halaman yang dipilih
                                                    if(isset($_GET['kata_cari'])) {
                                                        $kata_cari = $_GET['kata_cari'];
                                                        $query = "SELECT * FROM surat_keluar WHERE status = 'pending' AND (nomor LIKE '%$kata_cari%' OR kategori LIKE '%$kata_cari%' OR perihal LIKE '%$kata_cari%') ORDER BY id ASC LIMIT $offset, $limit";
                                                    } else {
                                                        $query = "SELECT * FROM surat_keluar WHERE status = 'pending' ORDER BY id ASC LIMIT $offset, $limit";
                                                    }

                                                    $result = mysqli_query($con, $query);

                                                    if(!$result) {
                                                        die("Query Error : ".mysqli_errno($con)." - ".mysqli_error($con));
                                                    }

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <tr>
                                                        <th><?php echo $row['nomor']; ?></th>
                                                        <td><?php echo $row['kategori']; ?></td>
                                                        <td><?php echo $row['tujuan']; ?></td>
                                                        <td><?php echo $row['perihal']; ?></td>
                                                        <td><?php echo $row['tgl_keluar']; ?></td>
                                                        <td><?php echo $row['waktu']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                        <td>                
                                                            <a href="suratacc/lihat.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary">Lihat</button></a>
                                                        </td>                                                  

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <!--------------------- PAGINATION ----------->
                        <nav aria-label="Page navigation example" style="margin-top: 10px">
                            <ul class="pagination justify-content-end">
                                <?php
                                    if ($page > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="?page='.($page - 1).'">Previous</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                                    }

                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $page) {
                                            echo '<li class="page-item active"><span class="page-link">'.$i.'</span></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                                        }
                                    }

                                    if ($page < $total_pages) {
                                        echo '<li class="page-item"><a class="page-link" href="?page='.($page + 1).'">Next</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>

</body>

</html>
