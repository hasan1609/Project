    <?php
    include '../config/koneksi.php';
    if (!isset($_SESSION['id_user'])) {
        //jika belum login jangan lanjut..
        header("location :http://localhost/Project/index.php");
    }

    //cek level user
    if ($_SESSION['role'] != "superadmin" and $_SESSION['role'] != "admin") {
        header("location:http://localhost/Project/index.php"); //jika bukan admin jangan lanjut
    }
    ?>