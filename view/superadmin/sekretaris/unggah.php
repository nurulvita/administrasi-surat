<?php
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
    <?php include 'admin-header.php'; ;?>
</head>

<body>
    <!-- content -->
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h1 class="pb-2 fw-bold">Sekretaris >> Unggah</h1>
                            <h5 class="op-7 mb-2">Catatan :</h5>
                            <h5 class="op-7 mb-2">
                                <ul>
                                    <li>Gunakan File dengan Format png/jpg/jpeg</li>
                                </ul>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Tambah Sekretaris</h4>

                            </div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <!-- Horizontal Form -->
                                <form id="registrationForm" class="mx-1 mx-md-4" action="tambah.php" method="post" enctype="multipart/form-data" onsubmit="register(event)">
                    <div class="row mb-4">
                      <div class="col">
                        <div class="d-flex flex-row align-items-center">
                          <i class="fas fa-user fa-lg fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example1c"><i class="bi bi-person-circle"></i> Nama</label>
                            <input type="text" id="form3Example1c" class="form-control form-control-lg" name="nama" autocomplete="off" placeholder="masukkan nama anda" style="border-radius:25px ;" required />
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex flex-row align-items-center">
                          <i class="fas fa-envelope fa-lg fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c"><i class="bi bi-envelope-at-fill"></i> Email</label>
                            <input type="email" id="form3Example3c" class="form-control form-control-lg" name="email" autocomplete="off" placeholder="masukkan email anda" style="border-radius:25px ;" required />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <div class="col">
                        <div class="d-flex flex-row align-items-center">
                          <i class="fas fa-user fa-lg fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example1c"><i class="bi bi-person-badge-fill"></i> Username</label>
                            <input type="text" id="form3Example1c" class="form-control form-control-lg" name="username" autocomplete="off" placeholder="masukkan username anda" style="border-radius:25px ;" required />
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex flex-row align-items-center">
                          <i class="fas fa-building fa-lg fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="departemen"><i class="bi bi-building"></i> Departemen</label>
                            <select id="departemen" class="form-control form-control-lg" name="departemen" style="border-radius: 25px;" required>
                              <option value="" selected disabled hidden>Pilih Departemen</option>
                              <option value="bpi">BPI</option>
                              <option value="relekat">Relekat</option>
                              <option value="kpsdm">KPSDM</option>
                              <option value="rppm">RPPM</option>
                              <option value="biro_inkref">Biro Inkref</option>
                              <option value="kominfo">Kominfo</option>
                              <option value="kepanitiaan">Lainnya</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <div class="col">
                        <div class="d-flex flex-row align-items-center">
                          <i class="fas fa-briefcase fa-lg fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="position"><i class="bi bi-person-lines-fill"></i> Role</label>
                            <select id="jabatan" class="form-control form-control-lg" name="jabatan" style="border-radius: 25px;" required>
                              <option value="" selected disabled hidden>Pilih Role</option>
                              <option value="sekretaris umum">Sekretaris Umum</option>
                              <option value="sekretaris panitia">Sekretaris Panitia</option>
                              <option value="sekretaris departemen">Sekretaris Departemen</option>
                              <option value="sekretaris divisi">Sekretaris Divisi</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex flex-row align-items-center">
                          <i class="fas fa-lock fa-lg fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
                            <input type="password" id="form3Example4c" class="form-control form-control-lg" name="password" autocomplete="off" placeholder="masukkan password anda" style="border-radius:25px ;" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col">
                          <div class="d-flex flex-row align-items-center">
                              <div class="form-outline flex-fill mb-0">
                                  <label class="form-label" for="formFile"><i class="bi bi-file-image fa-lg fa-fw"></i> Foto Profil</label>
                                  <input class="form-control form-control-lg" type="file" id="foto" name="foto" accept="image/*" required>

                              </div>
                          </div>
                      </div>
                  </div>


                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Register" name="register" class="btn btn-primary btn-lg text-light my-2" style="width:100% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ;" />
                    </div>
                  </form>
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
