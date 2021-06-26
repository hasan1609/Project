<?php
session_start();
include "../config/koneksi.php";

$id = $_GET['id'];

$pilih = mysqli_query($koneski, "SELECT * FROM karyawan WHERE id_karyawan='$id'");
$data = mysqli_fetch_array($pilih);
$foto = $data['foto'];
unlink("../Image/" . $foto);
$hapus = mysqli_query($koneski, "DELETE FROM karyawan WHERE id_karyawan='$id'");
if ($hapus) {
    $_SESSION['status'] = "Data Berhasil Dihapus";
    header('location: index.php');
} else {
    echo "Data Gagal Ditambahkan";
}
