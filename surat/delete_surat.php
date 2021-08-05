<?php
session_start();
include "../config/koneksi.php";

$id = $_GET['id'];
$hapus = mysqli_query($koneski, "DELETE FROM template WHERE id='$id'");
if ($hapus) {
    $_SESSION['status'] = "Data Berhasil Dihapus";
    header('location: data_surat.php');
} else {
    echo "Data Gagal Dihapus";
}
