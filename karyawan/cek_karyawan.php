<?php
session_start();
include '../config/koneksi.php';
$jabatan = $_POST['jabatan'];
$nik = $_POST['nik'];
$nama = strtolower($_POST['nama']);
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$agama = $_POST['agama'];
$jk = $_POST['jk'];
$daftar = $_POST['daftar'];
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
                $query = mysqli_query($koneski, "INSERT into karyawan(kd_jabatan, nik, nama, ttl, alamat, notlp, agama, jk, tgl_pendaftaran, foto) VALUES ('$jabatan', '$nik', '$nama', '$ttl', '$alamat', '$tlp', '$agama', '$jk', '$daftar', '$rename')");
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
