<?php
session_start();
$header = "dashboard";
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">

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

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $query1 = mysqli_query($koneski, "SELECT * FROM jabatan");
                            $count1 = mysqli_num_rows($query1);
                            ?>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Jabatan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count1; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $query2 = mysqli_query($koneski, "SELECT * FROM karyawan");
                            $count2 = mysqli_num_rows($query2);
                            ?>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Seluruh Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count2; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        while ($data = mysqli_fetch_array($query1)) {

        ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $data['nama_jabatan']; ?>
                                    <input type="hidden" name="kd" value="<?= $data['kd_jabatan'] ?>">
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $query_all = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE karyawan.kd_jabatan = '$data[kd_jabatan]'");
                                    $count_all = mysqli_num_rows($query_all);
                                    echo "$count_all";
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>