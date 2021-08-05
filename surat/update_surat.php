<?php
session_start();
include '../config/koneksi.php';
$id = $_POST['id'];
$kd = $_POST['kd'];
$isi = $_POST['isi'];
$nama = $_POST['nama'];
$hal = $_POST['hal'];

// proses Edit data
if (isset($_POST['upload'])) {
  $query = mysqli_query($koneski, "UPDATE template SET id='$id', kd_surat='$kd', isi='$isi', nama='$nama', hal='$hal' WHERE id = '$id' ");

  if ($query) {
    $_SESSION['status'] = "Data Berhasil diubah";
    header('location: data_surat.php');
  } else {
    echo "Data Gagal Diubah";
  };
}
