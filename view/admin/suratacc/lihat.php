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
    <?php include_once 'admin-header.php'; ?>
    <style>
        .card-header {
            background-color: #eee;
            color: #007bff;
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
            <h1 class="text-center fw-bold mx-1 pt-3 pb-3 card-header">Detail Surat</h1>
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
                                            <a href="../suratacc.php" class="btn btn-primary btn-rounded">Kembali</a>
                                            <!-- Form untuk mengirimkan data ke setuju.php -->
                                            <form action="setuju.php" method="POST" style="display: inline;">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <button type="submit" class="btn btn-success btn-rounded">Setujui</button>
                                            </form>
                                            <!-- Tombol untuk menampilkan modal tolak -->
                                            <button type="button" class="btn btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#tolakModal">Tolak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        // Memeriksa apakah file ada sebelum menyertakannya dalam iframe
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

            <!-- Modal tolak -->
            <div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="tolakModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tolakModalLabel">Tolak Surat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="tolak.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Alasan Penolakan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>

</body>

</html>
