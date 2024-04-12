<?php
session_start();
include_once('config/koneksi.php');

// Periksa apakah pengguna sudah login
// if (isset($_SESSION['login'])) {
//     header('Location: index.php');
//     exit;
// }

function setLoginCookies($email, $password, $jabatan)
{
    setcookie("email", $email, time() + (86400 * 30), '/');
    setcookie("password", $password, time() + (86400 * 30), '/');
    setcookie("jabatan", $jabatan, time() + (86400 * 30), '/');
}

if (isset($_COOKIE['email']) && isset($_COOKIE['password']) && isset($_COOKIE['jabatan'])) {
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
    $jabatan = $_COOKIE['jabatan'];

    $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password' AND `jabatan`='$jabatan'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $name = $row['nama'];

        $_SESSION['nama'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['jabatan'] = $jabatan;

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
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    if(isset($_POST['jabatan'])) {
        $jabatan = $_POST['jabatan'];
    } else {
        $jabatan = '';
    }

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

        if (isset($_POST['ingatSaya']) && $_POST['ingatSaya'] == 'true') {
            setLoginCookies($email, $password, $jabatan);
        }

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
