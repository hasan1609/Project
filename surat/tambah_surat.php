<?php
session_start();
include '../config/koneksi.php';
$kd = $_POST['kd'];
$isi = $_POST['isi'];
$nama = $_POST['nama'];
$hal = $_POST['hal'];

// proses Input data
if (isset($_POST['upload'])) {
    $query = mysqli_query($koneski, "INSERT into template (kd_surat,nama, isi, hal) VALUES ('$kd','$nama', '$isi', '$hal')");

    if ($query) {
        $_SESSION['status'] = "Data Berhasil ditambahkan";
        header('location: data_surat.php');
    } else {
        echo "Data Gagal Ditambahkan";
    };
}
