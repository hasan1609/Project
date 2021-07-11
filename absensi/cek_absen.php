<?php
session_start();
include "../config/koneksi.php";
include 'akses.php';

if (isset($_POST['upload'])) {
    if ($_POST['aksi'] == "absen_baru") {
        foreach ($_POST['id_karyawan'] as $id_karyawan) {
            $query = mysqli_query($koneski, "INSERT INTO absensi(tgl_absen,keterangan,id_karyawan) VALUES ('$_POST[tgl_absen]','$_POST[kehadiran]',$id_karyawan);");
            if ($query) {
                $_SESSION['status'] = "Absensi Telah Berhasil DItambahkan";
                header('location: index.php');
            } else {
                echo "Data Gagal Ditambahkan";
            }
        }
    } else if ($_POST['aksi'] == "edit_absen") {
        foreach ($_POST['id_karyawan'] as $id_karyawan) {
            $query = mysqli_query($koneski, "UPDATE absensi SET tgl_absen = '$_POST[tgl_absen]', keterangan = '$_POST[kehadiran]'WHERE id_karyawan = $id_karyawan and tgl_absen='$_POST[tgl_absen]';");
            if ($query) {
                $_SESSION['status'] = "Absensi Telah Berhasil Diubah";
                header('location: index.php');
            } else {
                echo "Data Gagal Ditambahkan";
            }
        }
    } else {
        foreach ($_POST['id_karyawan'] as $id_karyawan) {
            $query = mysqli_query($koneski, "DELETE FROM absensi WHERE id_karyawan = $id_karyawan and tgl_absen='$_POST[tgl_absen]'");
            if ($query) {
                $_SESSION['status'] = "Absensi Telah Berhasil Dihapus";
                header('location: index.php');
            } else {
                echo "Data Gagal Ditambahkan";
            }
        }
    }
}
