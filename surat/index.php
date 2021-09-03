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
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi Pertahun
                <a href="cetak_surat.php" class="btn btn-sm btn-outline-primary float-right"><i class="fa fa-print" aria-hidden="true"></i> Cetak Surat</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>jabatan</th>
                            <th>Jumalah Alpa</th>
                            <th>SP 1</th>
                            <th>SP 2</th>
                            <th>SP 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $keterangan_alpha = 0;
                        $karyawan_query = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan ORDER BY jabatan.kd_jabatan ASC");
                        while ($karyawan = mysqli_fetch_array($karyawan_query)) {
                            $jml_absen = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan = '$karyawan[id_karyawan]' AND CONCAT(YEAR(tgl_absen)) = CONCAT(YEAR(NOW()))");
                            while ($data_jml = mysqli_fetch_array($jml_absen)) {
                                if ($data_jml['keterangan'] == 'a') {
                                    $keterangan_alpha++;
                                }
                            }
                        ?>
                            <tr>
                                <td><?= $karyawan['nama']; ?></td>
                                <td><?= $karyawan['nama_jabatan']; ?></td>
                                <?php
                                if ($keterangan_alpha > 1) {
                                    echo '<td class="text-light bg-danger"><strong>' . $keterangan_alpha . '</strong></td>';
                                } else {
                                    echo '<td>' . $keterangan_alpha . '</td>';
                                }
                                $keterangan_alpha = 0;
                                ?>
                                <?php
                                $query_sp1 = mysqli_query($koneski, "SELECT * FROM surat WHERE id_karyawan =$karyawan[id_karyawan]");
                                while ($sp1 = mysqli_fetch_array($query_sp1)) {
                                    if ($sp1['kategori_surat'] == '1') {
                                        echo '<td><i class="fa fa-check" aria-hidden="true"></i></td>';
                                    } else {
                                        echo '<td></td>';
                                    }
                                    if ($sp1['kategori_surat'] == '2') {
                                        echo '<td><i class="fa fa-check" aria-hidden="true"></i></td>';
                                    } else {
                                        echo '<td></td>';
                                    }
                                    if ($sp1['kategori_surat'] == '3') {
                                        echo '<td><i class="fa fa-check" aria-hidden="true"></i></td>';
                                    } else {
                                        echo '<td></td>';
                                    }
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

<!-- modal -->


<!-- /.container-fluid -->
<?php include '../layout/footer.php' ?>