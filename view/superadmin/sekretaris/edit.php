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
</head>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h1 class="pb-2 fw-bold">Sekretaris >> Edit Data Sekretaris</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Data Sekretaris</h4>
                            </div>
                            <div class="card-body">
                                <!-- Horizontal Form -->
                                <?php
                                include '../../../config/koneksi.php';
                                $user = mysqli_query($con, "SELECT * from user WHERE id = $id");
                                foreach ($user as $data) {
                                ?>
                                    <form action="prosesedit.php" method="POST" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="jabatan" value="<?php echo $data['jabatan']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="foto">
                                                <?php
                                                // Menampilkan foto pengguna saat ini
                                                $file_name = $data['foto'];
                                                $file_path = '../../../uploads/' . basename($file_name);
                                                if (file_exists($file_path)) {
                                                    echo '<img src="' . $file_path . '" class="img-fluid" style="max-width: 200px; max-height: 200px;" alt="Foto Profil">';
                                                } else {
                                                    echo 'Foto tidak tersedia';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="text-left">
                                            <a href="../sekretaris.php"><button type="button" class="btn btn-secondary"><< Kembali</button></a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form><!-- End Horizontal Form -->
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
