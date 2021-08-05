 <?php
  session_start();
  $header = 'jabatan';
  include "../config/koneksi.php";

  $kd = $_POST['kd-jabatan'];
  $nama = strtoupper($_POST['nama']);
  if (isset($_POST['upload'])) {

    $query = mysqli_query($koneski, "UPDATE jabatan SET nama_jabatan ='$nama' WHERE kd_jabatan='$kd'");

    if ($query) {
      $_SESSION['status'] = "Data Berhasil Diubah";
      header('location: index.php');
    } else {
      echo "Data Gagal Ditambahkan";
    }
  }
  ?>
