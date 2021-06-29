<?php
session_start();
$header = 'karyawan';
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
        </div>

        <div class="card-body">
            <a class="btn btn-primary" href="index.php">Back</a>
            <br><br>
            <?php
            if (isset($_GET['nik'])) {
                $nik = $_GET['nik'];
            } else {
                die("Error. No ID Selected!");
            }
            $data = mysqli_query($koneski, "SELECT * FROM karyawan WHERE nik ='$nik'");
            $row = mysqli_fetch_array($data)
            ?>
            <div class="row">
                <div class="col-lg-4">
                    <img src="../Image/<?= $row['foto']; ?>" alt="" class="img-thumbnail">
                </div>
                <div class="col-lg-8">
                    <div class="p-1">
                        <table>
                            <tr>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4">Nama
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"> :
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"><?= $row['nama']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4">Tgl Lahir
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"> :
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"><?= $row['ttl']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4">Alamat
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"> :
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"><?= $row['alamat']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4">Tlp/No.Hp
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"> :
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"><?= $row['notlp']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4">Jenis Kelamin
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"> :
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"><?= $row['jk']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4">Agama
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"> :
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"><?= $row['agama']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4">Tgl Masuk
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="text-gray-900 mb-4"> :
                                </td>
                                <td></td>
                                <td>
                                    <h2 class="h4 text-gray-900 mb-4"><?= $row['tgl_pendaftaran']; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include '../layout/footer.php' ?>