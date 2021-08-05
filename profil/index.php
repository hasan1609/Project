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
            <?php
            $query = mysqli_query($koneski, "SELECT * FROM profil");
            while ($value = mysqli_fetch_array($query)) {
            ?>
                <form class="" action="update.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4">
                            <img id="preview" src="../Image/<?= $value['gambar']; ?>" / style="width: 150px; margin: 10px;" alt="Gambar Anda"><br>
                            <div class="form-group">
                                <p>Logo Perusahaan</p>
                                <input type="hidden" name="foto_lama" value="<?= $value['gambar']; ?>" /></td>
                                <input type="file" class="form-control form-control-user" id="image" name="image">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                            <div class="form-group">
                                <p>Nama Perusahaan</p>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $value['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <p>Email</p>
                                <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $value['email']; ?>">
                            </div>
                            <div class="form-group">
                                <p>Telepon</p>
                                <input type="text" class="form-control form-control-user" id="tlp" name="tlp" value="<?= $value['tlp']; ?>">
                            </div>
                            <div class="form-group">
                                <p>Kota</p>
                                <input type="text" class="form-control form-control-user" id="kota" name="kota" value="<?= $value['kota']; ?>">
                            </div>
                            <div class="form-group">
                                <p>Alamat Lengkap</p>
                                <textarea class="form-control form-control-user" id="alamat" name="alamat"><?= $value['alamat']; ?></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit" name="upload">Simpan</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>

    </div>

</div>
<!-- /.container-fluid -->
<?php include '../layout/footer.php' ?>