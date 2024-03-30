<?php
include_once('config/koneksi.php');

if(isset($_POST['register']))
{
    // Mendapatkan data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email']; 
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];

    // Periksa apakah file foto telah diunggah
    if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
        // Pemrosesan foto profil
        $target_dir = "uploads/"; // Direktori untuk menyimpan foto profil
        $target_file = $target_dir . basename($_FILES["foto"]["name"]); // Path lengkap file yang diunggah
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Periksa apakah file sudah ada
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Batasi ukuran file
        if ($_FILES["foto"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Izinkan format file tertentu
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Jika semua kondisi terpenuhi, coba unggah file
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                // Simpan data ke database jika unggahan foto berhasil
                $sql = "INSERT INTO `user` (`nama`, `email`, `username`, `password`, `departemen`, `jabatan`, `foto`) VALUES ('$nama', '$email', '$username', '$password', '$departemen', '$jabatan', '$target_file')";
                
                // Eksekusi query
                $result = mysqli_query($con, $sql);
                
                // Periksa hasil eksekusi query
                if($result) { 
                    header('location:index.php');
                    echo "<script>alert('Anda Berhasil Registrasi');</script>";   
                } else {
                    echo "Sorry, there was an error saving your data.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Please select a file.";
    }
}
?>
