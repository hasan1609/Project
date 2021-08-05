<?php
session_start();
$header = 'surat';
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        die("Error. No ID Selected!");
    }
    $query = mysqli_query($koneski, "SELECT * FROM template WHERE id = '$id'");
    $data = mysqli_fetch_array($query)
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Surat</h6>
        </div>
        <div class="card-body">
            <form action="update_surat.php" method="POST">
                <div class="row">
                    <input type="hidden" name="id" id="id" value="<?= $data['id'] ?>">
                    <div class=" col-lg-3">
                        <div class="form-group">
                            <p>Kode Surat</p>
                            <input type="text" class="form-control form-control-user" id="kd" name="kd" value="<?= $data['kd_surat'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>Nama Surat</p>
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $data['nama'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <p>Hal Surat</p>
                            <input type="text" class="form-control form-control-user" id="hal" name="hal" value="<?= $data['hal'] ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p>Isi Surat</p>
                    <textarea class="ckeditor" id="isi" name="isi"><?= $data['isi'] ?></textarea>
                </div>
                <button class="btn btn-primary" type="submit" name="upload">Simpan</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?php include '../layout/footer.php' ?>