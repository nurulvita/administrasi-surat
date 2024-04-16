<?php
include_once('../../../config/koneksi.php');

if(isset($_POST['register']))
{
    // Mendapatkan data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email']; 
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];

    if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
  
        $target_dir = "../../../uploads/"; 
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["foto"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO `user` (`nama`, `email`, `username`, `password`, `departemen`, `jabatan`, `foto`) VALUES ('$nama', '$email', '$username', '$password', '$departemen', '$jabatan', '$target_file')";
                
                $result = mysqli_query($con, $sql);
                
                if($result) { 
                    header('location:../sekretaris.php');
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
