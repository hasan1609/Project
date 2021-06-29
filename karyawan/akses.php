    <?php
    session_start();
    if (!isset($_SESSION['id_user'])) {
        //jika belum login jangan lanjut..
        header("Location :../index.php");
    }

    //cek level user
    if ($_SESSION['role'] != "superadmin" and $_SESSION['role'] != "admin") {
        header("Location:../404.php"); //jika bukan admin jangan lanjut
    }
    ?>