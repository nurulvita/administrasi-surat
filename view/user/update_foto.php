<?php
session_start();
include_once('../../config/koneksi.php');

if (!isset($_SESSION['email'])) {
    header('location: ../../index.php');
    exit();
}

$email = $_SESSION['email'];

if(isset($_POST["submit"])) {
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["foto"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Update foto path in database
            $query = "UPDATE user SET foto = '".basename( $_FILES["foto"]["name"])."' WHERE email = '$email'";
            mysqli_query($con, $query);
            header('Location: profil.php');
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
