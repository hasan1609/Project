<?php
session_start();
include '../config/koneksi.php';

$id = $_POST['id'];
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
$foto_lama = $_POST['foto_lama'];
$size = $_FILES["image"]["size"];
$ext = ['jpg', 'jpeg', 'png'];
$folder = $_FILES["image"]["tmp_name"];
$ext_Gambar = explode('.', $gambar);
$ext_Gambar = strtolower(end($ext_Gambar));
$rename = uniqid();
$rename .= '.';
$rename .= $ext_Gambar;
if (isset($_POST['upload'])) {
    if ($gambar != '') {
        if (in_array($ext_Gambar, $ext)) {
            if ($size < 5000000) {
                unlink("../Image/" . $foto_lama);
                move_uploaded_file($folder, "../Image/" . $rename);
                $query = mysqli_query($koneski, "UPDATE karyawan SET kd_jabatan='$_POST[jabatan]', nik='$_POST[nik]', nama='$_POST[nama]', ttl='$_POST[ttl]', alamat='$_POST[alamat]',notlp='$_POST[tlp]', agama='$_POST[agama]', jk='$_POST[jk]', tgl_pendaftaran='$_POST[daftar]', foto ='$rename' WHERE id_karyawan='$id'");
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
        $query = mysqli_query($koneski, "UPDATE karyawan SET kd_jabatan='$_POST[jabatan]', nik='$_POST[nik]', nama='$_POST[nama]', ttl='$_POST[ttl]', alamat='$_POST[alamat]',notlp='$_POST[tlp]', agama='$_POST[agama]', jk='$_POST[jk]', tgl_pendaftaran='$_POST[daftar]' WHERE id_karyawan='$id'");
        if ($query) {
            $_SESSION['status'] = "Data Berhasil diubah";
            header('location: index.php');
        } else {
            echo "Data Gagal Ditambahkan";
        }
    }
}
