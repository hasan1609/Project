<?php
session_start();
include 'akses.php';
$header = 'absensi';
include '../config/koneksi.php';
include '../layout/header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Absensi Harian Karyawan</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form class="" method="get" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <span class="input-group-text">
                        Jabatan
                    </span>
                    <select class="form-control" aria-label="form-select-sm example" name="jabatan">
                        <option>----Pilih Jabatan----</option>
                        <?php
                        $data = mysqli_query($koneski, "SELECT * FROM jabatan");
                        while ($value = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?= $value['kd_jabatan']; ?>"><?= $value['nama_jabatan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-xs-3">
                    <input class="btn btn-primary" type="submit" name="Cari" value="Cari">
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
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
                    <form action="cek_absen.php" method="post">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped with-check" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Absen <input type="checkbox" id="checkbox" name="title-table-checkbox" onclick="checkAll(this)" /></th>
                                        <th>Hari Ini</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_GET['Cari'])) {
                                        $query = "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE jabatan.kd_jabatan = '$_GET[jabatan]';";
                                    } else {
                                        $query = "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan ORDER BY jabatan.kd_jabatan ASC";
                                    }
                                    $no = 1;
                                    $date = date("y-m-d");
                                    $data = mysqli_query($koneski, $query);
                                    while ($value = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= strtoupper($value['nama']); ?></td>
                                            <td><?= $value['nama_jabatan']; ?></td>
                                            <td><input type="checkbox" id="checkbox" name="id_karyawan[]" value="<?= $value['id_karyawan']; ?>" /></td>
                                            <?php $query_tampil_tanggal = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan=$value[id_karyawan]
                                                                and tgl_absen like '%$date%' ORDER BY tgl_absen ASC;");
                                            while ($data_tanggal = mysqli_fetch_array($query_tampil_tanggal)) {
                                            ?>
                                                <td>
                                                    <?php
                                                    if ($data_tanggal['keterangan'] == 'h') {
                                                        echo "Hadir";
                                                    } else if ($data_tanggal['keterangan'] == 'a') {
                                                        echo "Alpha";;
                                                    } else if ($data_tanggal['keterangan'] == 'i') {
                                                        echo "Izin";;
                                                    } else if ($data_tanggal['keterangan'] == 'l') {
                                                        echo "Libur";;
                                                    }  ?>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengabsenan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>keterangan :</label>
                        <select name="kehadiran" class="form-control">
                            <option value="h">Hadir</option>
                            <option value="a">Alpha</option>
                            <option value="i">Izin</option>
                            <option value="l">Libur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal :</label>
                        <input type="date" name="tgl_absen" class="form-control form-control-user" value="<?PHP echo date('Y-m-d'); ?>">
                    </div>
                    <div class="control-group">
                        <label class="control-label">Aksi :</label>
                        <select name="aksi" class="form-control">
                            <option value="absen_baru">Baru</option>
                            <option value="edit_absen">Edit</option>
                            <option value="hapus_absen">Hapus</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" name="upload" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
</div>

<?php
include '../layout/footer.php' ?>