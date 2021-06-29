<?php
session_start();
include '../config/koneksi.php';
if (isset($_POST['upload'])) {
    $nama = $_POST['nama'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $username = strtolower($_POST['username']);
    $role = "admin";

    // cek username

    $result = mysqli_query($koneski, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username Sudah Ada !')
        window.location='tambah.php'</script>";
        return false;
    }
    //query
    $query =  mysqli_query($koneski, "INSERT INTO user(nama, username, password, role) VALUES('$nama', '$username' , '$password', '$role')");

    if ($query) {
        $_SESSION['status'] = "Data Berhasil ditambahkan";
        header('location: index.php');
    } else {
        echo "Data Gagal Ditambahkan";
    }
}
