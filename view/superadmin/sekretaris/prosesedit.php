<?php 
include '../../../config/koneksi.php';

if($_SERVER['REQUEST_METHOD']=='POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $jabatan = $_POST['jabatan'];
    $filelama = $_POST['filelama'];

    // Cek apakah ada file foto yang diunggah
    if($_FILES['foto']['type'] != null){
        $newfilename = date('dmYHi') . str_replace(" ", "", basename($_FILES["foto"]["name"]));
        $targetfolder = "../../../uploads/" . $newfilename;
        $file_type = $_FILES['foto']['type'];
        // Pastikan file yang diunggah adalah gambar
        if ($file_type == "image/jpeg" || $file_type == "image/jpg" || $file_type == "image/png") {
            // Pindahkan file foto ke folder yang dituju
            if(move_uploaded_file($_FILES['foto']['tmp_name'], $targetfolder)) {
                // Jika berhasil diunggah, update data pengguna termasuk foto baru
                $sql = "UPDATE user SET nama = '$nama', email = '$email', username = '$username', jabatan = '$jabatan', foto = '$targetfolder' WHERE id = '$id'";
            } else {
                echo "File Gagal di Upload";
            }
        } else {
            echo "Hanya Boleh upload file gambar (JPG, JPEG, PNG) .<br>";
        }
    } else {
        // Jika tidak ada file foto yang diunggah, update data pengguna tanpa memperbarui foto
        $sql = "UPDATE user SET nama = '$nama', email = '$email', username = '$username', jabatan = '$jabatan' WHERE id = '$id'";
    }     

    if(mysqli_query($con, $sql)) {
        echo "<script>alert('Berhasil Mengedit Data Sekretaris!');
              window.location.href='lihat.php?id=" . $id . "';
              </script>";
    } else {
        echo "<script>alert('Gagal Mengedit Data Sekretaris!');</script>" . mysqli_error($con);
    }
}
?>
