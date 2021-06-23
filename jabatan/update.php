 <?php

   include "../config/koneksi.php";

   $kd = $_POST['kd-jabatan'];
   $nama = $_POST['nama'];

   mysqli_query($koneski, "UPDATE jabatan SET nama_jabatan ='$nama' WHERE kd_jabatan='$kd'");

   echo "<script>window.alert('Data Berhasil Diubah')
   window.location='index.php'</script>";
   ?>
