<?php
session_start();
$header = 'jabatan';
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jabatan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jabatan</h6>
        </div>
        <div class="card-body">
            <form class="" action="cek_jabatan.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <p>Kode Jabatan</p>
                    <input type="text" class="form-control form-control-user" id="kd-jabatan" name="kd-jabatan" placeholder="Ex : Adm1">
                </div>
                <div class="form-group">
                    <p>Nama Jabatan</p>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Ex: Admin">
                </div>
                <br>
                <div class="col-xs-3">
                    <button class="btn btn-primary" type="submit" name="upload">Simpan</button>
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>