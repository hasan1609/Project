<?php
session_start();
$header = 'karyawan';
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
        </div>

        <div class="card-body">
            <a class="btn btn-primary" href="index.php">Back</a>
            <br><br>
            <?php
            if (isset($_GET['nik'])) {
                $nik = $_GET['nik'];
            } else {
                die("Error. No ID Selected!");
            }
            $data = mysqli_query($koneski, "SELECT * FROM karyawan WHERE id_karyawan ='$nik'");
            $row = mysqli_fetch_array($data)
            ?>
            <div class="row">
                <div class="col-lg-3">
                    <img src="../Image/<?= $row['foto']; ?>" alt="" class="img-thumbnail" style="margin-top: 20px;">
                    <table style="margin: 10px;">
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Nama
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Tgl Lahir
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['ttl']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Alamat
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['alamat']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Tlp/No.Hp
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['notlp']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Jenis Kelamin
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['jk']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Agama
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['agama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="h6 text-gray-900">Tgl Masuk
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"> :
                            </td>
                            <td></td>
                            <td>
                                <h3 class="h6 text-gray-900"><?= $row['tgl_pendaftaran']; ?>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <h6 style="text-align: center;"><strong>Data Surat Peringatan</strong></h6>
                    <table style="margin-left: 10px;">
                        <?php
                        $keterangan_alpha = 0;
                        $keterangan_izin = 0;
                        $keterangan_hadir = 0;
                        $jml_absen = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan = '$nik' AND CONCAT(YEAR(tgl_absen)) = CONCAT(YEAR(NOW()))");
                        while ($data_jml = mysqli_fetch_array($jml_absen)) {
                            if ($data_jml['keterangan'] == 'h') {
                                $keterangan_hadir++;
                            } else if ($data_jml['keterangan'] == 'a') {
                                $keterangan_alpha++;
                            } else if ($data_jml['keterangan'] == 'i') {
                                $keterangan_izin++;
                            }
                        }
                        ?>
                        <tr>
                            <td>Alpa</td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td><?= $keterangan_alpha; ?></td>
                        </tr>
                        <tr>
                            <td>Izin</td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td><?= $keterangan_izin; ?></td>
                        </tr>
                        <tr>
                            <td>Hadir</td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td><?= $keterangan_hadir; ?></td>
                        </tr>
                    </table>
                    <hr>
                    <a href="cetak_sp.php?id=<?php echo "$_GET[bulan]&tahun=$_GET[tahun]&jabatan=$_GET[jabatan]"; ?>" class="btn btn-outline-primary" target="_blank">
                        <i class="fa fa-print"></i> Cetak SP</a>
                </div>
                <div class="col-lg-9">
                    <div class="p-1">
                        <h4 style="text-align: center;"><strong>Data Absebnsi </strong></h4>
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <?php
                            $absen = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan = '$nik' ORDER BY tgl_absen DESC ");

                            while ($data_absen = mysqli_fetch_array($absen)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?= $data_absen['tgl_absen']; ?></td>
                                        <?php
                                        if ($data_absen['keterangan'] == 'h') {
                                            echo '<td><strong>Hadir</strong></td>';
                                        } else if ($data_absen['keterangan'] == 'l') {
                                            echo '<td class="text-danger"><strong>Libur</strong></td>';
                                        } else if ($data_absen['keterangan'] == 'a') {
                                            echo '<td class="text-light bg-danger"><strong>Alpa</strong></td>';
                                        } else if ($data_absen['keterangan'] == 'i') {
                                            echo '<td class="text-info"><strong>Izin</strong></td>';
                                        }
                                        ?>
                                    </tr>
                                <?php } ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include '../layout/footer.php' ?>