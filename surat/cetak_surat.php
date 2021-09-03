<?php
session_start();
$header = 'surat';
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cetak Surat</h6>
                </div>
                <div class="card-body">
                    <form class="" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <p>Pilih Surat</p>
                            <select class="form-control selectpicker" name="surat" required data-live-search="true">
                                <?php
                                $data = mysqli_query($koneski, "SELECT * FROM template");
                                while ($value1 = mysqli_fetch_array($data)) {
                                ?>
                                    <option value="<?= $value1['id']; ?>"><?= $value1['nama']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Pilih Karyawan</p>
                            <select class="form-control selectpicker" name="karyawan" required data-live-search="true">
                                <?php
                                $data = mysqli_query($koneski, "SELECT * FROM karyawan");
                                while ($value = mysqli_fetch_array($data)) {
                                ?>
                                    <option value="<?= $value['id_karyawan']; ?>"><?= $value['nama']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <p><i>*Data akan otomatis terinput jika anda menekan tombol cetak</i></p>
                            <input class="btn btn-primary" type="submit" name="cetak" value="Cetak">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if (isset($_POST['cetak'])) {
            $nomor = 123323;
            $tgl = date("d-m-y");
            mysqli_query($koneski, "INSERT into surat(kategori_surat,no_surat,id_karyawan,tgl) VALUES ('$_POST[surat]','$nomor','$_POST[karyawan]','$tgl')")
        ?>

            <div class="col-lg-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <button class="btn btn-sm btn-outline-primary float-right" onclick="return printArea('area')"><i class="fa fa-print" aria-hidden="true"></i> Cetak</button>
                    </div>
                    <div class="card-body">
                        <?php
                        $query_kop = mysqli_query($koneski, "SELECT * FROM profil");
                        $kop = mysqli_fetch_array($query_kop);
                        ?>
                        <div id="area">
                            <div class="grid-container" style="display: grid; grid-template-columns: 160px auto;">
                                <div class="grid-item">
                                    <img src="../Image/<?= $kop['gambar'] ?>" alt="" width="120px">
                                </div>
                                <div class="grid-item align-content-center">
                                    <p style="text-align:center; font-size: 3.5vw; margin-top:10px; margin-bottom: 0;; width:auto;"><?= $kop['nama'] ?></p>
                                    <p style="text-align:center; margin: 0;"><?= $kop['alamat'] ?><br>
                                        Tlp : <?= $kop['tlp'] ?> | Email :<?= $kop['email'] ?> | Fax :<?= $kop['tlp'] ?></p>
                                </div>
                            </div>
                            <hr color="black">
                            <hr color="black" style="margin-bottom: 20px;">
                            <?php
                            $surat_query = mysqli_query($koneski, "SELECT * FROM template WHERE id like '%$_POST[surat]%'");
                            $surat = mysqli_fetch_array($surat_query);
                            $karyawan_query = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE karyawan.id_karyawan like '%$_POST[karyawan]%'");
                            $karyawan = mysqli_fetch_array($karyawan_query);
                            ?>
                            <Table>
                                <tr>
                                    <td>NO</td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td>0000/HRD/<?= $surat['kd_surat'] ?>/RMS/VI/<?= date('Y') ?></td>
                                </tr>
                                <tr>
                                    <td>HAL</td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td><?= $surat['hal'] ?></td>
                                </tr>
                            </Table>
                            <br>

                            <p>Kepada :
                                <br>
                                <strong><?= $karyawan['nama'] ?>
                                    <br>
                                    (<?= $karyawan['nama_jabatan'] ?>)</strong>
                                <br>
                                Di Tempat
                            </p>
                            <br>
                            <table>
                                <tr>
                                    <td>CC</td>
                                    <td></td>
                                    <td>:</td>
                                    <td></td>
                                    <td><strong><?php  ?></strong></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Akuuuuu</strong></td>
                                </tr>
                            </table>
                            <br>
                            <p><?= $surat['isi']; ?></p>
                            <br>
                            <br>
                            <table cellspacing="0" style="width: 100%; text-align: right; font-size: 10pt; margin-top: 10px">
                                <tr>
                                    <td style="width: 30%"><?= $kop['kota'] ?>, <?= date('d-m-Y') ?></td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <br>
                            <?php
                            $ttd_query = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE jabatan.nama_jabatan='HRD'");
                            $ttd = mysqli_fetch_array($ttd_query);
                            ?>
                            <p style="text-align: right; font-size: 12pt;"><Strong><?= $ttd['nama'] ?></Strong><br>(Saff HRD)</p>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>


</div>
<!-- /.container-fluid -->
<?php include '../layout/footer.php' ?>
<script type="text/javascript">
    function printArea(area) {
        var printPage = document.getElementById(area).innerHTML;
        var oriPage = document.body.innerHTML;
        document.body.innerHTML = printPage;
        window.print();
        document.body.innerHTML = oriPage;
    }
</script>