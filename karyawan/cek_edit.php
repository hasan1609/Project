<?php
include '../config/koneksi.php';

$id = $_POST['id'];
$jabatan = $_POST['jabatan'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$agama = $_POST['agama'];
$jk = $_POST['jk'];
$daftar = $_POST['daftar'];
$gambar = $_FILES["image"]["name"];
// $size = $_FILES["image"]["size"];
// $ext = ['jpg', 'jpeg', 'png'];
// $folder = $_FILES["image"]["tmp_name"];
// $ext_Gambar = explode('.', $gambar);
// $ext_Gambar = strtolower(end($ext_Gambar));
// $rename = uniqid();
// $rename .= '.';
// $rename .= $ext_Gambar;
if (isset($_POST['upload'])) {
    // if ($gambar != '') {
    //     mysqli_query($koneski, "UPDATE karyawan SET kd_jabatan='$jabatan', nik='$nik', nama='$nama', ttl='$ttl', alamat=$alamat',notlp='$tlp', agama='$agama', jk='$jk', tgl_pendaftaran='$daftar' WHERE id_karyawan='$id'");
    //     // echo "<script>alert ('data telah di update ');document.location='index.php' </script> ";
    // } else {
    mysqli_query($koneski, "UPDATE karyawan SET kd_jabatan='$_POST[jabatan]', nik='$_POST[nik]', nama='$_POST[nama]', ttl='$_POST[ttl]', alamat='$_POST[alamat]',notlp='$_POST[tlp]', agama='$_POST[agama]', jk='$_POST[jk]', tgl_pendaftaran='$_POST[daftar]' WHERE id_karyawan='$id'");
    // }
}
