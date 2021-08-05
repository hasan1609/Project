<?php
session_start();
$header = 'karyawan';
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php';


if (isset($_POST['cari'])) {
    $cari = $_POST['nama'];
    $filter = mysqli_real_escape_string($koneski, $_POST['jabatan']);
    $query = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE nama like '%$cari%' OR karyawan.kd_jabatan = '$filter'");
} else {
    $query = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan");
}
$no = 1;
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Karyawan
                <a class="btn btn-sm btn-primary float-right" href="tambah.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Tambah
                    Data
                    Kayawan</a>
            </h4>
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
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($value = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="../Image/<?= $value['foto']; ?>" style="width: 100px;"></td>
                                <td><?= $value['nik']; ?></td>
                                <td><?= strtoupper($value['nama']); ?></td>
                                <td><?= $value['alamat']; ?></td>
                                <td><?= $value['nama_jabatan']; ?></td>
                                <td>
                                    <a href="detail.php?nik=<?= $value['id_karyawan']; ?>" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="edit.php?id=<?= $value['id_karyawan']; ?>" class="btn btn-info btn-circle btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $value['id_karyawan']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus ?')">
                                        <i class="fas fa-trash"></i>
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

<?php include '../layout/footer.php'; ?>