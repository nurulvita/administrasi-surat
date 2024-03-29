<?php
session_start();
include_once('../../config/koneksi.php');

if (!isset($_SESSION['email'])) {
    header('location:../../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../role/user/user-header.php'; ?>
</head>

<body>
    <!-- content -->
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h1 class="pb-2 fw-bold">Arsip Surat >> Unggah</h1>
                            <h5 class="op-7 mb-2">Unggah surat yang telah terbit pada form ini untuk diarsipkan</h5>
                            <h5 class="op-7 mb-2">Catatan :</h5>
                            <h5 class="op-7 mb-2">
                                <ul>
                                    <li>Gunakan File dengan Format PDF</li>
                                </ul>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Unggah Surat</h4>

                            </div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <!-- Horizontal Form -->
                                <form action="tambah.php" method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Surat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nomor" required placeholder="Masukkan Nomor Surat">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <select class="form-control form-control" id="kategori" name="kategori" required>
                                                    <option selected disabled hidden>Pilih Kategori</option>
                                                    <option>Undangan</option>
                                                    <option>Peminjaman</option>
                                                    <option>Permohonan</option>
                                                    <option>Pemberitahuan</option>
                                                    <option>Peringatan</option>
                                                    <option>Mandat</option>
                                                    <option>Keputusan</option>
                                                    <option>Rekomendasi</option>
                                                </select>
                                                <span class="input-group-text"><i class='bx bx-chevron-down'></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tujuan" required placeholder="Masukkan Tujuan Surat">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Perihal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="perihal" required placeholder="Masukkan Perihal Surat">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="tgl_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="file" class="form-control" required placeholder="Pilih File Surat">
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <a href="index.php"><button type="button" class="btn btn-secondary"><< Kembali</button></a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form><!-- End Horizontal Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>

</html>
