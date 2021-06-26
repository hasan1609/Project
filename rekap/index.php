<?php
$header = 'rekap';
include '../layout/header.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rekap Absensi</h1>

    <div class="card shadow-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
        </div>
        <div class="card-body">
            <form action="" method="get">
                <div class="form-group">
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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <select class="form-control" aria-label="form-select-sm example" name="bulan">
                                <?php
                                $nama_bulan = [
                                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                                    'September', 'Oktober', 'November', 'Desember'
                                ];
                                for ($nomor_bulan = 1; $nomor_bulan <= 12; $nomor_bulan++) {
                                    if ($nomor_bulan < 10) {
                                        echo "<option value='0$nomor_bulan'>" . $nama_bulan[$nomor_bulan - 1] . "</option>";
                                    } else {
                                        echo "<option value='$nomor_bulan'>" . $nama_bulan[$nomor_bulan - 1] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <input class="btn btn-primary" type="submit" name="cari">
                </div>
            </form>
        </div>
    </div>
    <hr>
    <?php if (isset($_GET['cari'])) { ?>
        <div class="card shadow-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Jabatan</th>
                            <th>Print</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <?php
                            $query_jabatan = mysqli_query($koneski, "SELECT * FROM jabatan WHERE kd_jabatan='$_GET[jabatan]'");
                            while ($data_jabatan = mysqli_fetch_array($query_jabatan)) {
                            ?>
                                <td><?php echo  "$_GET[tahun]-$_GET[bulan]"; ?></td>
                                <td><?= $data_jabatan['nama_jabatan']; ?></td>
                                <td>
                                    <a href="cek_rekap.php?bulan=<?php echo "$_GET[bulan]&tahun=$_GET[tahun]&jabatan=$_GET[jabatan]"; ?>" target="_blank">
                                        <i class="fa fa-print"></i> PDF</a>
                                <?php
                            } ?>
                                </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
    <!-- DataTales Example -->
</div>

<?php include '../layout/footer.php'; ?>