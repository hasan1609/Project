<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$pilih = mysqli_query($koneski, "SELECT * FROM karyawan WHERE id_karyawan='$id'");
$data = mysqli_fetch_array($pilih);
$foto = $data['foto'];
unlink("../Image/" . $foto);
$hapus = mysqli_query($koneski, "DELETE FROM karyawan WHERE id_karyawan='$id'");
if ($hapus) {
    $hapus2 = mysqli_query($koneski, "DELETE FROM absensi WHERE id_karyawan='$id'");
    echo "<script>alert('berhasil');
    location.href='index.php';
    </script>";
} else {
    echo "gagal";
}
