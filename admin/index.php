<?php
session_start();
include 'akses.php';
include '../layout/header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Admin</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="tambah.php"><i class=" fa fa-user-plus" aria-hidden="true"></i> Tambah Admin</a>
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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config/koneksi.php';
                        $no = 1;
                        $data = mysqli_query($koneski, "SELECT * FROM user");
                        while ($value =  mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $value['nama']; ?></td>
                                <td><?php echo $value['username']; ?></td>
                                <td>
                                    <a href="delete.php?id=<?= $value['id_user']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus ?')">
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


    <!-- DataTales Example -->
</div>


<?php
include '../layout/footer.php' ?>