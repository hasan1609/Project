<?php
include '../config/koneksi.php';
$kd = $_POST['kd-jabatan'];
$nama = $_POST['nama'];

// proses Input data

mysqli_query($koneski, "INSERT into jabatan VALUES ('$kd', '$nama')");

echo "<script>window.alert('Berhasil Menambahkan Data')
window.location='index.php'</script>";
