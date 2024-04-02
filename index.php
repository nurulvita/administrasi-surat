<?php
session_start();
include_once('config/koneksi.php');

// if (!isset($_SESSION['email'])) {
//     header('location: index.php');
//     exit();
// }

if (isset($_POST['ingatSaya']) && $_POST['ingatSaya'] == "true") {
    setcookie("ingatSaya", "true", time() + (86400 * 30), "/"); 
}

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$jabatan = isset($_SESSION['jabatan']) ? $_SESSION['jabatan'] : '';

if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<h1 class="text-center fw-bold mx-1 pt-1 pb-3" style="background:linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%); color:white">INFORSArchive</h1>
<section class="vh-80">
    <div class="container py-3 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="assets/img/login.jpg" class="img-fluid" alt="" height="300px" width="600px">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form id="loginForm" action="login.php" method="post" onsubmit="saveLoginData()">
                    <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Login </p>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email"> <i class="bi bi-person-circle"></i> Email</label>
                        <input type="email" id="email" class="form-control form-control-lg" name="email" autocomplete="off" placeholder="enter your email" style="border-radius:25px ;" required />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
                        <input type="password" id="password" class="form-control form-control-lg" name="password" autocomplete="off" placeholder="enter your password" style="border-radius:25px ;" required/>
                    </div>

                    <!-- Jabatan input -->
                    <div class="form-outline mb-2">
                        <label class="form-label" for="jabatan"><i class="bi bi-person-lines-fill"></i> Role</label>
                        <select id="jabatan" class="form-control form-control-lg" name="jabatan" style="border-radius: 25px;">
                            <option value="" selected disabled hidden>Pilih Role</option>
                            <option value="sekretaris umum">Sekretaris Umum</option>
                            <option value="sekretaris panitia">Sekretaris Panitia</option>
                            <option value="sekretaris departemen">Sekretaris Departemen</option>
                            <option value="sekretaris divisi">Sekretaris Divisi</option>
                        </select>
                    </div>

                    <!-- Ingat Saya input -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="ingatSaya" name="ingatSaya" value="true">
                        <label class="form-check-label" for="ingatSaya">Ingat Saya</label>
                    </div>

                    <!-- Submit button -->
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input type="submit" value="Sign in" name="login" class="btn btn-primary btn-lg text-light my-2" style="width:100% ; border-radius: 30px; font-weight:600;" />
                    </div>
                </form>

                <br>
                <p align="center">Belum punya akun? <a href="register.php" class="text-primary" style="font-weight:600;text-decoration:none;"> Daftar Akun</a></p>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<script>
    function saveLoginData() {
        var email = document.getElementById('email').value;
        var jabatan = document.getElementById('jabatan').value;
        var ingatSaya = document.getElementById('ingatSaya').checked;

        var loginData = {
            email: email,
            jabatan: jabatan,
            ingatSaya: ingatSaya
        };

        localStorage.setItem('loginData', JSON.stringify(loginData));
    }
</script>
</body>
</html>
