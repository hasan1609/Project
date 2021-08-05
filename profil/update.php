<?php
session_start();
include '../config/koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$tlp = $_POST['tlp'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];
$gambar = $_FILES["image"]["name"];
$foto_lama = $_POST['foto_lama'];
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
                unlink("../Image/" . $foto_lama);
                move_uploaded_file($folder, "../Image/" . $rename);
                $query = mysqli_query($koneski, "UPDATE profil SET id='$_POST[id]', nama='$nama', email='$email', tlp='$tlp', kota='$kota', alamat='$alamat', gambar='$rename' WHERE id= '$_POST[id]'");
                if ($query) {
                    $_SESSION['status'] = "Data Berhasil diubah";
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
    } else {
        $query = mysqli_query($koneski, "UPDATE profil SET id='$_POST[id]', nama='$nama', email='$email', tlp='$tlp', kota='$kota', alamat='$alamat' WHERE id= '$_POST[id]'");
        if ($query) {
            $_SESSION['status'] = "Data Berhasil diubah";
            header('location: index.php');
        } else {
            echo "Data Gagal Diubah";
        }
    }
}
