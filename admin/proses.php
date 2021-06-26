<?php
session_start();
include '../config/koneksi.php';
if ($_GET['admin'] == "tambah") {
    $nama = $_POST['nama'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $username = $_POST['username'];
    $level = 1;

    //query
    $query =  mysqli_query($koneski, "INSERT INTO admin(nama, username, password, level) VALUES('$nama', '$username' , '$password', '$level')");

    if ($query) {
        $_SESSION['status'] = "Data Berhasil ditambahkan";
        header('location: index.php');
    } else {
        echo "Data Gagal Ditambahkan";
    }
}
