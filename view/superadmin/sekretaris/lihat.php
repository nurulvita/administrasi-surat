<?php
$id = $_GET['id'];

session_start();
include_once('../../../config/koneksi.php');

if (!isset($_SESSION['email'])) {
    header('location: ../../../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'admin-header.php'; ?>
    <style>
        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content">  
            <?php   
            include '../../../config/koneksi.php';
            $user = mysqli_query($con, "SELECT * from user WHERE id = $id");
            foreach ($user as $data) {
                // Mengambil nama file dari database (foto profil)
                $file_name = $data['foto'];
                
                // Path relatif dari folder uploads
                $file_path = '../../../uploads/' . basename($file_name);
            ?>
                <h1 class="text-center fw-bold mx-1 pt-3 pb-3" style="background: #eee; color: #007bff;">Detail User</h1>
                <div class="container container-fluid">
                    <div class="page-inner">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nama</th>
                                                        <td><?php echo $data['nama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Email</th>
                                                        <td><?php echo $data['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Username</th>
                                                        <td><?php echo $data['username']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jabatan</th>
                                                        <td><?php echo $data['jabatan']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-right">
                                                <a href="../sekretaris.php" class="btn btn-primary btn-rounded" style="border-radius: 20px;">Kembali</a>
                                                <a href="<?php echo $file_path; ?>" class="btn btn-success btn-rounded" style="border-radius: 20px;">Lihat Foto</a>
                                                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-rounded" style="border-radius: 20px;">Edit</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($file_path)) {
                                                echo '<img src="' . $file_path . '" class="img-fluid" alt="Foto Profil">';
                                            } else {
                                                echo 'Foto tidak ditemukan';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
    <script src="../../assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
