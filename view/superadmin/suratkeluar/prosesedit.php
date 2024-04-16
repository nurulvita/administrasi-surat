<?php 
    include '../../../config/koneksi.php';
    if($_SERVER['REQUEST_METHOD']=='POST') {
      $id = $_POST['id'];
      $nomor = $_POST['nomor'];
      $kategori = $_POST['kategori'];
      $tujuan = $_POST['tujuan'];
      $perihal = $_POST['perihal']; 
      $tgl_keluar = $_POST['tgl_keluar'];     
      $filelama = $_POST['filelama'];
      date_default_timezone_set('Asia/Pontianak');
      $waktu = date("Y-m-d H:i");

      if($_FILES['file']['type']!=null){
         $newfilename= date('dmYHi').str_replace(" ", "", basename($_FILES["file"]["name"]));
         $targetfolder = "../../../pdf/pdfsk/" . $newfilename ;
         $file_type=$_FILES['file']['type'];
         if ($file_type=="application/pdf") {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder ))
            {
               $sql = "UPDATE surat_keluar SET nomor = '$nomor', kategori = '$kategori', tujuan= '$tujuan', perihal ='$perihal', tgl_keluar = '$tgl_keluar', waktu ='$waktu', file ='$targetfolder' WHERE id = '$id'";
            }
            else {
               echo "File Gagal di Upload";
            }
         }
         else {
         echo "Hanya Boleh upload file PDF .<br>";
         }
      } else{
         $sql = "UPDATE surat_keluar SET nomor = '$nomor', kategori = '$kategori', tujuan = '$tujuan', perihal ='$perihal', tgl_keluar = '$tgl_keluar', waktu ='$waktu', file='$filelama' WHERE id = '$id'";
      }     
   
      if(mysqli_query($con,$sql)) {
         echo "<script>alert('Berhasil Mengarsip Surat!');
               window.location.href='lihat.php?id=".$id."';
               </script>";
      } else {
         echo "<script>alert('Gagal Mengarsip Surat!');</script>".mysqli_error($con);
      }
   }
?>