<?php
session_start();
include 'config/koneksi.php';
$username = strtolower($_POST['username']);
$password = $_POST["password"];

if (isset($_POST['login'])) {
    $query = mysqli_query($koneski, "SELECT * FROM user WHERE username='$username' && password='$password'");
    if (mysqli_num_rows($query) > 0) {
        while ($user = mysqli_fetch_array($query)) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['role'] = $user['role'];
        }
        if ($_SESSION['role'] == "admin") {
            $_SESSION['status'] = "login";
            Header("location: absensi/index.php");
        } else if ($_SESSION['role'] == "superadmin") {
            $_SESSION['status'] = "login";
            Header("location: dashboard/index.php");
        }
    } else {
        Header("location:index.php?pesan=gagal");
    }
} else {
    Header("location:index.php");
}
