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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Surat
                <a class="btn btn-sm btn-primary float-right" href="add_surat.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Tambah Data Surat</a>
            </h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION['status'])) { ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong><?= $_SESSION['status']; ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="row">
                <?php
                $query_surat = mysqli_query($koneski, "SELECT * FROM template");
                while ($data = mysqli_fetch_array($query_surat)) {
                ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <a href=" preview.php?id=<?= $data['id'] ?>" target="_blank">
                                        <div class="col mr-2">
                                            <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                                <?= $data['nama']; ?>
                                                <input type="hidden" name="kd" value="<?= $data['id_surat'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="../Image/default.png" class="img-thumbnail" alt="">
                                        </div>
                                        <br>
                                    </a>
                                </div>
                                <a href="edit_surat.php?id=<?= $data['id'] ?>" class="btn btn-primary btn-sm float-left"><i class="fa fa-edit"></i></a>
                                <a href="delete_surat.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('Yakin ingin menghapus ?')"><i class=" fa fa-trash"></i></a>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?php include '../layout/footer.php' ?>