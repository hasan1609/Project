<?php
session_start();
include '../config/koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$tlp = $_POST['tlp'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];
$gambar = $_FILES["image"]["name"];
$size = $_FILES["image"]["size"];
$ext = ['jpg', 'jpeg', 'png'];
$folder = $_FILES["image"]["tmp_name"];
$ext_Gambar = explode('.', $gambar);
$ext_Gambar = strtolower(end($ext_Gambar));
$rename = uniqid();
$rename .= '.';
$rename .= $ext_Gambar;


// proses Input data
if (isset($_POST['upload'])) {
  if ($gambar != '') {
    if (in_array($ext_Gambar, $ext)) {
      if ($size < 5000000) {
        move_uploaded_file($folder, "../Image/" . $rename);
        $query = mysqli_query($koneski, "INSERT into profil(nama,email,tlp,kota,alamat,gambar) VALUES ('$nama', '$email', '$tlp', '$kota', '$alamat', '$rename')");
        if ($query) {
          $_SESSION['status'] = "Data Berhasil ditambahkan";
          header('location: index.php');
        } else {
          echo "Data Gagal Ditambahkan";
        }
      } else {
        echo '<script>alert("Ukuran Gambar Terlalu Besar")</script>';
      }
    } else {
      echo '<script>alert("Tidak Sesuai Image File")</script>';
    }
  }
}
