<?php
include_once('config/koneksi.php');

if(isset($_POST['register']))
{
    $nama = $_POST['nama'];
    $email = $_POST['email']; 
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];

    $sql = "INSERT INTO `user` (`nama`, `email`, `username`, `password`, `departemen`, `jabatan`) VALUES ('$nama', '$email', '$username', '$password', '$departemen', '$jabatan')";
    $result = mysqli_query($con, $sql);
    
    if($result) { 
        header('location:index.php');
        echo "<script>alert('New User Register Success');</script>";   
    } else {
        die(mysqli_error($con));
    }
}
?>

