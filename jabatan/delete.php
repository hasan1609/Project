<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$hapus = mysqli_query($koneski, "DELETE FROM jabatan WHERE kd_jabatan='$id'");
if ($hapus) {
    echo "<script>alert('berhasil');
    location.href='index.php';
    </script>";
} else {
    echo "gagal";
}
