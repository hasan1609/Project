<?php
$header = 'absensi';
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php';
$keterangan_alpha = 0;
$keterangan_izin = 0;
$keterangan_hadir = 0;
$keterangan_libur = 0;
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Absensi Perbulan</h1>

    <div class="card shadow-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
        </div>
        <div class="card-body">
            <form action="" method="get">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <select class="form-control" aria-label="form-select-sm example" name="jabatan" required>
                                <option>----Pilih Jabatan----</option>
                                <?php
                                $query = mysqli_query($koneski, "SELECT * FROM jabatan");
                                while ($value = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $value['kd_jabatan']; ?>"><?= $value['nama_jabatan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
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
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <input class="btn btn-primary" type="submit" name="carinama" value="Cari">
                </div>
            </form>
        </div>

    </div>

    <hr>
    <?php
    if (isset($_GET['carinama'])) {
        $cari_nama = $_GET['nama'];
        $cari_bulan = $_GET['bulan'];
        $filter = $_GET['jabatan'];
        $query_tampil = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE jabatan.kd_jabatan='$_GET[jabatan]' OR nama = '$cari_nama' ORDER BY nama ASC");
    } else {
        // query tampil
        $query_tampil = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan ORDER BY jabatan.kd_jabatan ASC");
    }
    ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (isset($_GET['carinama'])) { ?>
                <h5><?php echo "$_GET[bulan]-$_GET[tahun]"; ?></h5>
            <?php } else { ?>
                <h5><?php echo date('F-y'); ?></h5>
            <?PHP } ?>
        </div>
        <div class="card-body">
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan='2'>Nama</th>
                                <th rowspan="2">Jabatan</th>
                                <th rowspan='2'>L/P</th>
                                <?php for ($tanggal_table = 1; $tanggal_table <= 31; $tanggal_table++) {
                                    echo "<th rowspan='2'>$tanggal_table</th>";
                                } ?>
                                <th colspan="4">Jumlah</th>
                            </tr>
                            <tr>
                                <th>H</th>
                                <th>A</th>
                                <th>I</th>
                                <th>L</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            while ($data = mysqli_fetch_array($query_tampil)) {
                                if ($data['jk'] == "Laki-laki") {
                                    $jk = "L";
                                } else {
                                    $jk = "P";
                                } ?>
                                <tr>
                                    <td><input type="checkbox" name="id_karyawan[]" value="<?PHP echo $data['id_karyawan']; ?>" /></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['nama_jabatan']; ?></td>
                                    <td><?php echo $jk ?></td>
                                    <?php
                                    //perulangan kehadiran sesuai tanggal
                                    $nomor2 = 1;
                                    //perulangan kehadiran sesuai tanggal
                                    if (isset($_GET['bulan'])) {
                                        $query_tampil_tanggal = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan=$data[id_karyawan] and tgl_absen like '%$_GET[tahun]-$cari_bulan%' ORDER BY tgl_absen ASC;");
                                    } else {
                                        $cari_bulann = date('m');
                                        $tahunn = date('Y');
                                        $query_tampil_tanggal = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan=$data[id_karyawan]
                                                                and tgl_absen like '%$tahunn-$cari_bulann%' ORDER BY tgl_absen ASC;");
                                    }
                                    while ($data_tanggal = mysqli_fetch_array($query_tampil_tanggal)) {
                                        //mengabil tanggal
                                        $ambil_tanggal = explode("-", $data_tanggal['tgl_absen']);
                                        //merubah menjadi tanggal jadi integer
                                        $ambil_tanggal[2] = (int)$ambil_tanggal[2];

                                        //perulangan kehadiran sesuai tanggal
                                        for ($nomor = $nomor2; $nomor <= $ambil_tanggal[2]; $nomor++) {
                                            if ($nomor == $ambil_tanggal[2]) {
                                                if ($data_tanggal['keterangan'] == 'h') {
                                                    echo '<td><i class="fa fa-check" aria-hidden="true"></i></span></td>';
                                                } else if ($data_tanggal['keterangan'] == 'l') {
                                                    echo '<td style="background-color: red;"></td>';
                                                } else {
                                                    echo "<td><b>" . strtoupper($data_tanggal['keterangan']) . "</b></td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }
                                        }
                                        //meng rekap bulannan
                                        if ($data_tanggal['keterangan'] == 'h') {
                                            $keterangan_hadir++;
                                        } else if ($data_tanggal['keterangan'] == 'a') {
                                            $keterangan_alpha++;
                                        } else if ($data_tanggal['keterangan'] == 'i') {
                                            $keterangan_izin++;
                                        } else if ($data_tanggal['keterangan'] == 'l') {
                                            $keterangan_libur++;
                                        }
                                        $nomor2 = $ambil_tanggal[2] + 1;
                                        $sisa_td = 31 - $nomor2;
                                    }
                                    if (isset($sisa_td) != true) {
                                        $sisa_td = 30;
                                    }
                                    for ($td = 0; $td <= $sisa_td; $td++) {
                                        echo "<td></td>";
                                    }
                                    //tampilan rekap absen
                                    echo "<td>$keterangan_hadir</td>
                                                            <td>$keterangan_alpha</td>
                                                            <td>$keterangan_izin</td>
                                                            <td>$keterangan_libur</td>";
                                    ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
            <br>
        </div>
    </div>
</div>

<?php
include '../layout/footer.php'
?>