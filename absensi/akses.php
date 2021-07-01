    <?php
    include '../config/koneksi.php';
    // if (!isset($_SESSION['id_user'])) {
    //     //jika belum login jangan lanjut..
    //     header("location :../index.php");
    // }

    //cek level user
    if ($_SESSION['role'] != "superadmin" and $_SESSION['role'] != "admin") {
        header("location:../index.php?ref=harap_login"); //jika bukan admin jangan lanjut
    }
    ?>