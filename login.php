<?php
session_start();
include_once('config/koneksi.php');

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
  }

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    if(isset($_POST['jabatan'])) {
        $jabatan = $_POST['jabatan'];
    } else {
        $jabatan = '';
    }

    // Periksa apakah inputan kosong
    if (empty($_POST['email']) || empty($_POST['password']) || empty($jabatan)) {
        header('location:index.php');
        exit(); // tambahkan exit setelah redirect
    }

    $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password' AND `jabatan`='$jabatan'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $name = $row['nama'];

        $_SESSION['nama'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['jabatan'] = $jabatan;

        // Tambahkan logika "Ingat Saya"
        if ($_POST['ingatSaya'] == 'true') {
            setcookie('ingat_saya_email', $email, time() + 60, '/');
            setcookie('ingat_saya_password', $password, time() + 60, '/'); 

        }

        // Redirect sesuai jabatan
        if ($jabatan == 'sekretaris umum') {
            header('location: view/admin');
            exit();
        } elseif ($jabatan == 'sekretaris departemen' || $jabatan == 'sekretaris panitia' || $jabatan == 'sekretaris divisi') {
            header('location: view/user');
            exit();
        } else {
            echo "<script>alert('Invalid Position');</script>";
            header('location:index.php');
            exit();
        }
    } else {
        echo "<script>alert('Invalid email, Password, or Position');</script>";
        header('location:index.php');
        exit();
    }
}
?>
