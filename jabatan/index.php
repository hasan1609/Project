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
            <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="tambah.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Tambah Jabatan</a>
            <br><br>
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode jabatan</th>
                            <th>Nama Jabatan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config/koneksi.php';
                        $no = 1;
                        $data = mysqli_query($koneski, "SELECT * FROM jabatan");
                        while ($value =  mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $value['kd_jabatan']; ?></td>
                                <td><?php echo strtoupper($value['nama_jabatan']); ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $value['kd_jabatan']; ?>" class="btn btn-info btn-circle btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $value['kd_jabatan']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus ?')">
                                        <i class=" fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>