<?php
session_start();
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Setting Profil</h6>
        </div>

        <div class="card-body">
            <form class="" action="cek_jabatan.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <p>Nama Perusahaan</p>
                    <input type="text" class="form-control form-control-user" id="pt" name="pt">
                </div>
                <div class="form-group">
                    <p>Email</p>
                    <input type="text" class="form-control form-control-user" id="email" name="email">
                </div>
                <div class="form-group">
                    <p>Telepon</p>
                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp">
                </div>
                <div class="form-group">
                    <p>Kota</p>
                    <input type="text" class="form-control form-control-user" id="kota" name="kota">
                </div>
                <div class="form-group">
                    <p>Alamat</p>
                    <textarea class="form-control form-control-user" id="alamat" name="alamat"></textarea>
                </div>
                <img id="preview" src="#" / style="width: 150px; margin: 10px;" alt="Gambar Anda"><br>
                <div class="form-group">
                    <p>Logo Perusahaan</p>
                    <input type="file" class="form-control form-control-user" id="image" name="image">
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