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

        if ($jabatan == 'admin') {
            header('location: view/admin');
        } else {
            header('location:view/user');
        }
    } else {
        echo "<script>alert('Invalid email, Password, or Position');</script>";
        header('location:index.php');
    }
}
?>
