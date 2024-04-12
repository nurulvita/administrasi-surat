<?php
session_start();
include_once('config/koneksi.php');

// Periksa apakah pengguna sudah login
// if (isset($_SESSION['login'])) {
//     header('Location: index.php');
//     exit;
// }

// Fungsi untuk mengatur cookies
function setLoginCookies($email, $password, $jabatan)
{
    // Set cookies dengan masa aktif 30 hari
    setcookie("email", $email, time() + (86400 * 30), '/');
    setcookie("password", $password, time() + (86400 * 30), '/');
    setcookie("jabatan", $jabatan, time() + (86400 * 30), '/');
}

// Periksa apakah cookies "ingat_saya_email" dan "ingat_saya_password" sudah ada
if (isset($_COOKIE['email']) && isset($_COOKIE['password']) && isset($_COOKIE['jabatan'])) {
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
    $jabatan = $_COOKIE['jabatan'];

    // Anda juga harus memastikan bahwa nilai dari cookies sesuai dengan yang diinginkan
    // Misalnya, Anda dapat memvalidasi nilai jabatan untuk memastikan tidak terjadi manipulasi
    // Selain itu, pastikan untuk melakukan sanitasi data untuk mencegah serangan SQL injection

    // Lakukan proses login sesuai dengan cookies yang ditemukan
    // Anda dapat menggunakan logika login yang sudah ada atau menyesuaikannya dengan kebutuhan
    // Dalam contoh ini, saya hanya memberikan pengecekan sederhana
    $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password' AND `jabatan`='$jabatan'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $name = $row['nama'];

        $_SESSION['nama'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['jabatan'] = $jabatan;

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
    }
}

// Jika cookies tidak ditemukan atau tidak valid, lanjutkan dengan proses login standar
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
        if (isset($_POST['ingatSaya']) && $_POST['ingatSaya'] == 'true') {
            // Set cookies dengan masa aktif 30 hari
            setLoginCookies($email, $password, $jabatan);
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
