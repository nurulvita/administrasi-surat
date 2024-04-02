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
            $surat = mysqli_query($con, "SELECT * from surat_keluar WHERE id = $id");
            foreach ($surat as $data) {
                // Mengambil nama file dari database
                $file_name = $data['file'];
                
                // Path relatif dari folder pdf/pdfsk
                $file_path = '../../../pdf/pdfsk/' . basename($file_name);
            ?>
                <h1 class="text-center fw-bold mx-1 pt-3 pb-3" style="background: #eee; color: #007bff;">Detail Surat</h1>
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
                                                        <th scope="row">Nomor</th>
                                                        <td><?php echo $data['nomor']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kategori</th>
                                                        <td><?php echo $data['kategori']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tujuan</th>
                                                        <td><?php echo $data['tujuan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Perihal</th>
                                                        <td><?php echo $data['perihal']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tanggal Keluar</th>
                                                        <td><?php echo $data['tgl_keluar']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Waktu Unggah</th>
                                                        <td><?php echo $data['waktu']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-right">
                                                <a href="../suratkeluar.php" class="btn btn-primary btn-rounded" style="border-radius: 20px;">Kembali</a>
                                                <a href="<?php echo $file_path; ?>" class="btn btn-success btn-rounded" style="border-radius: 20px;">Unduh</a>
                                                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-rounded" style="border-radius: 20px;">Edit / Ganti File</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($file_path)) {
                                                echo '<iframe src="' . $file_path . '" width="100%" style="height:80vh"></iframe>';
                                            } else {
                                                echo 'File tidak ditemukan';
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
</body>

</html>
