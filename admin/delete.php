<?php
session_start();
include "../config/koneksi.php";

$id = $_GET['id'];
$hapus = mysqli_query($koneski, "DELETE FROM user WHERE id_user='$id'");
if ($hapus) {
    $_SESSION['status'] = "Data Berhasil Dihapus";
    header('location: index.php');
} else {
    echo "Data Gagal Ditambahkan";
}
