<?php
session_start();
include_once('config/koneksi.php');

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
            setcookie('ingat_saya_email', $email, time() + 3600 * 24 * 30, '/');
            setcookie('ingat_saya_password', $password, time() + 3600 * 24 * 30, '/'); 
        }

        // Redirect sesuai jabatan
        if ($jabatan == 'sekretaris umum') {
            header('location: view/admin');
            exit();
        } elseif (in_array($jabatan, ['sekretaris departemen', 'sekretaris panitia', 'sekretaris divisi'])) {
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
