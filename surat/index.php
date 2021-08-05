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
                <button class="btn btn-sm btn-outline-primary float-right" data-toggle="modal" data-target="#modalcetak"><i class="fa fa-print" aria-hidden="true"></i> Cetak Surat</button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
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
                                <td style="text-align: center;">
                                    <i class="fa fa-check" aria-hidden="true"></i><br>
                                </td>
                                <td style="text-align: center;">
                                    <i class="fa fa-check" aria-hidden="true"></i><br>
                                </td>
                                <td style="text-align: center;">
                                    <i class="fa fa-check" aria-hidden="true"></i><br>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- <div class="form-group">
                <p>Kode Surat</p>
                <input type="text" class="form-control form-control-user" id="kode" name="kode">
            </div>
            <div class="form-group">
                <p>Isi Surat</p>
                <textarea class="ckeditor" id="isi" name="isi"></textarea>
            </div>
            <button class="btn btn-primary" type="submit" name="upload">Simpan</button> -->
        </div>
    </div>


</div>

<!-- modal -->
<div id="modalcetak" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalcetak">Cetak Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <p>Pilih Surat</p>
                        <select class="form-control" aria-label=".form-select-sm example" name="surat" required>
                            <option>---Pilih Surat---</option>
                            <?php
                            $data = mysqli_query($koneski, "SELECT * FROM template");
                            while ($value = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Pilih Karyawan</p>
                        <select class="form-control" name="karyawan" required>
                            <option>---Pilih Karyawan---</option>
                            <?php
                            $data = mysqli_query($koneski, "SELECT * FROM karyawan");
                            while ($value = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="upload" value="Simpan"></input>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?php include '../layout/footer.php' ?>