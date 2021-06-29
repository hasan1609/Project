<?PHP
session_start();
include "config/koneksi.php";;
if (isset($_GET['id'])) {
    session_destroy();
    Header("Location:index.php");
}
