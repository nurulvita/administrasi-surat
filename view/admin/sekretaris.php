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


$email = $_SESSION['email'];
$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);
$_SESSION['username'] = $row['username'];
$_SESSION['nama'] = $row['nama']; 
$_SESSION['email'] = $row['email']; 

$allowed_roles = ['sekretaris departemen', 'sekretaris panitia', 'sekretaris divisi'];
$role_condition = implode("', '", $allowed_roles);

// Tentukan offset dan limit
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

$query = "SELECT * FROM user WHERE jabatan IN ('$role_condition') LIMIT $offset, $limit";
$result = mysqli_query($con, $query);

if(!$result) {
    die("Query Error : ".mysqli_errno($con)." - ".mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../role/admin/admin-header.php'; ?>
    <style>
        .image-frame {
            border-radius: 10px; 
            overflow: hidden; 
            width: 150px; 
            height: 150px; 
        }

        .image-frame img {
            width: 100%;
            height: 100%; 
            object-fit: cover;
        }
    </style>




</head>
<body>
    <div class="container container-fluid">
        <div class="wrapper">
            <div class="main-panel pt-4">
                <div class="content">
                    <!-- Header -->
                    <div class="panel-header bg-primary-gradient">
                        <div class="page-inner py-2">
                            <div class="row">
                                <!-- Foto Profil -->
                                <div class="col-md-6">
                                    <img src="../../assets/img/sekree.png" alt="" class="img-fluid" style="height: 55vh;">
                                </div>
                                <!-- Judul -->
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <h3 class="text-white pb-2 fw-bold" style="font-size: 40px;">DATA SEKRETARIS</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Sekretaris -->
                    <div class="page-inner mt--5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Data Sekretaris</h4>
                                    </div>
                                </div>
                                <div class="container container-fluid">
                                    <div class="card-body">
                                        <!-- Tabel Data Sekretaris -->
                                        <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Foto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['nama']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['username']; ?></td>
                                                        <td><?php echo $row['jabatan']; ?></td>
                                                        <td>
                                                            <?php   
                                                            include '../../config/koneksi.php';
                                                            // Mengambil nama file dari database
                                                            $file_name = $row['foto'];
                                                            // Path relatif dari folder uploads
                                                            $file_path = '../../uploads/' . basename($file_name);
                                                            ?>
                                                            <div class="image-frame"> <!-- Tambahkan kelas image-frame di sini -->
                                                                <img src="<?= $file_path ?>" class="img-fluid rounded-start" alt="Foto Profil" style="height: 20vh;">
                                                            </div>
                                                    
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <nav aria-label="Page navigation example" style="margin-top: 10px">
                                <ul class="pagination justify-content-end">
                                    <!-- Pagination Links -->
                                </ul>
                            </nav>
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
