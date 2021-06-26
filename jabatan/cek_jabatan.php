<?php
session_start();
include '../config/koneksi.php';
$kd = $_POST['kd-jabatan'];
$nama = $_POST['nama'];

// proses Input data
if (isset($_POST['upload'])) {
    $query = mysqli_query($koneski, "INSERT into jabatan VALUES ('$kd', '$nama')");

    if ($query) {
        $_SESSION['status'] = "Data Berhasil ditambahkan";
        header('location: index.php');
    } else {
        echo "Data Gagal Ditambahkan";
    };
}
