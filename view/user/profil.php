<?php
session_start();
include_once('../../config/koneksi.php');

if (!isset($_SESSION['email'])) {
    header('location: ../../index.php');
    exit();
}

// Mengambil data pengguna dari database berdasarkan email yang tersimpan di sesi
$email = $_SESSION['email'];
$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);
$_SESSION['username'] = $row['username'];
$_SESSION['nama'] = $row['nama'];
$_SESSION['jabatan'] = $row['jabatan'];
$_SESSION['departemen'] = $row['departemen'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../role/user/user-header.php'; ?>
</head>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h1 class="pb-2 fw-bold">Arsip Surat >> About</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>About</h1>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <?php   
                                            include '../../config/koneksi.php';
                                            $foto = mysqli_query($con, "SELECT * from user WHERE email = '$email'");
                                            foreach ($foto as $data) {
                                
                                                $file_name = $data['foto'];
                                                
                                                $file_path = '../../uploads/' . basename($file_name);
                                            ?>
                                            <img src="<?= $file_path ?>" class="img-fluid rounded-start" alt="Foto Profil" style="height: 50vh;">
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Profil:</h5>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Nama</th>
                                                            <td><?= $_SESSION['nama'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Username</th>
                                                            <td><?= $_SESSION['username'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td><?= $_SESSION['email'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Role</th>
                                                            <td><?= $_SESSION['jabatan'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Departemen</th>
                                                            <td><?= $_SESSION['departemen'] ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:history.go(-1)" class="btn btn-secondary">Kembali</a>
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
