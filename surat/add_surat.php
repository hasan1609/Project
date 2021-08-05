<?php
session_start();
$header = 'surat';
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Surat</h6>
        </div>
        <div class="card-body">
            <form action="tambah_surat.php" method="POST">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>Kode Surat</p>
                            <input type="text" class="form-control form-control-user" id="kd" name="kd">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>Nama Surat</p>
                            <input type="text" class="form-control form-control-user" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <p>Hal Surat</p>
                            <input type="text" class="form-control form-control-user" id="hal" name="hal">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p>Isi Surat</p>
                    <textarea class="ckeditor" id="isi" name="isi"></textarea>
                </div>
                <button class="btn btn-primary" type="submit" name="upload">Simpan</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?php include '../layout/footer.php' ?>