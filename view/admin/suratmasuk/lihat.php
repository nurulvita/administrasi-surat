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
        .table thead th {
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
            $surat = mysqli_query($con, "SELECT * from surat_masuk WHERE id = $id");
            foreach ($surat as $data) {
            ?>

                <h1 class="text-center fw-bold mx-1 pt-3 pb-3" style="background:#eee ; color:#007bff">Detail Surat</h1>
                <div class="container container-fluid">
                    <div class="page-inner">
                        <div class="page-header">
                            <div class="d-flex align-items-left">
                                <div class="col-md-6 mx-4">
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr> <!-- Baris judul tabel -->
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
                                                <th scope="row">Asal</th>
                                                <td><?php echo $data['asal']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Perihal</th>
                                                <td><?php echo $data['perihal']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal Terima</th>
                                                <td><?php echo $data['tgl_terima']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Waktu Unggah</th>
                                                <td><?php echo $data['waktu']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-right">
                                    <a href="../suratmasuk.php"><button type="button" class="btn btn-primary btn-rounded" style="border-radius: 20px;">Kembali</button></a>
                                    <a href="<?php echo $data['file']; ?>"><button class="btn btn-success btn-rounded" style="border-radius: 20px;">Unduh</button></a>
                                    <a href="edit.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-warning btn-rounded" style="border-radius: 20px;">Edit / Ganti File</button></a>
                                </div>

                                </div>
                                <div class="col-md-6"> 
                                    <iframe src="<?php echo $data['file']; ?>" width="100%" style="height:80vh"></iframe>
                                </div>
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

</body>

</html>
