<?php
session_start();
include '../config/koneksi.php';
include 'akses.php';

//deklarasi variable absen
$keterangan_alpha = 0;
$keterangan_izin = 0;
$keterangan_hadir = 0;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        function printArea(area) {
            var printPage = document.getElementById(area).innerHTML;
            var oriPage = document.body.innerHTML;
            document.body.innerHTML = printPage;
            window.print();
            document.body.innerHTML = oriPage;
        }
    </script>
</head>

<body>
    <?php
    $query_kop = mysqli_query($koneski, "SELECT * FROM profil");
    $kop = mysqli_fetch_array($query_kop)
    ?>



    <button style="margin-bottom: 20px; margin-left: 10px;" onclick="return printArea('area')">Print</button>

    <div id="area">
        <div style="margin: 40px;">

            <div class="grid-container" style="display: grid; grid-template-columns: 160px auto;">
                <div class="grid-item">
                    <img src="../Image/<?= $kop['gambar'] ?>" alt="" width="120px">
                </div>
                <div class="grid-item align-content-center">
                    <p style="text-align:center; font-size: 6vw; margin-top:10px; margin-bottom: 0;; width:auto;"><?= $kop['nama'] ?></p>
                    <p style="text-align:center; margin: 0;"><?= $kop['alamat'] ?><br>
                        Tlp : <?= $kop['tlp'] ?> | Email :<?= $kop['email'] ?> | Fax :<?= $kop['tlp'] ?></p>
                </div>
            </div>
            <hr color=" black">
            <hr color="black" style="margin-bottom: 20px;">
            <h2 style="text-align: center;">Laporan Absensi <?= "$_GET[bulan]/$_GET[tahun]" ?></h2>
            <table cellspacing="0" style=" width: 100%; border: solid 1px #000000; font-size: 12pt;">
                <tr>
                    <th rowspan="2" style="width: 4%; border: solid 1px #000000;">No</th>
                    <th style="width: 38%; border: solid 1px #000000;" rowspan="2">Nama</th>
                    <th style="width: 9%; border: solid 1px #000000;" rowspan="2">Jabatan</th>
                    <th style="width: 9%; border: solid 1px #000000;" rowspan="2">L/P</th>
                    <th style="width: 32%; border: solid 1px #000000;" colspan="3">
                        <p align="center">Jumlah</p>
                    </th>
                    <th style="width: 8%; border: solid 1px #000000;" rowspan="2">
                        <p align="center">Total</p>
                    </th>
                </tr>
                <tr>
                    <th style="width: 8%; border: solid 1px #000000;">H</th>
                    <th style="width: 8%; border: solid 1px #000000;">A</th>
                    <th style="width: 8%; border: solid 1px #000000;">I</th>
                </tr>
                <?php
                $no = 1;
                $query_rekap = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE jabatan.kd_jabatan='$_GET[jabatan]' ORDER BY nama ASC");
                while ($data = mysqli_fetch_array($query_rekap)) {

                    $query_jml = mysqli_query($koneski, "SELECT * FROM absensi WHERE tgl_absen like '%$_GET[tahun]-$_GET[bulan]%' AND id_karyawan=$data[id_karyawan]");
                    while ($data_jml = mysqli_fetch_array($query_jml)) {
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
                        <td style="width: 4%; border: solid 1px #000000; text-align: center;"><?php echo $no; ?></td>
                        <td style="width: 38%; border: solid 1px #000000; padding: 5px;"><?php echo strtoupper($data['nama']); ?></td>
                        <td style="width: 9%; border: solid 1px #000000; padding: 5px;"><?php echo strtoupper($data['nama_jabatan']); ?></td>
                        <td style="width: 9%; border: solid 1px #000000; padding: 5px;"><?php echo strtoupper($data['jk']); ?></td>
                        <?php
                        $query_tampil_tanggal = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan=$data[id_karyawan] and tgl_absen like '%$_GET[tahun]-$_GET[bulan]%' ORDER BY tgl_absen ASC;");
                        while ($data_tanggal = mysqli_fetch_array($query_tampil_tanggal)) {
                            //mengabil tanggal

                        }
                        ?>
                        <td style="width: 8%; border: solid 1px #000000; text-align: center;"><?php echo $keterangan_hadir; ?></td>
                        <td style="width: 8%; border: solid 1px #000000; text-align: center;"><?php echo $keterangan_alpha; ?></td>
                        <td style="width: 8%; border: solid 1px #000000; text-align: center;"><?php echo $keterangan_izin; ?></td>
                        <?php $total = $keterangan_hadir + $keterangan_alpha + $keterangan_izin;
                        echo '<td style="width: 8%; border: solid 1px #000000;"><p align="center">' . $total . '</p></td>'; ?>
                    </tr>
                <?php $no++;
                    $keterangan_hadir = 0;
                    $keterangan_izin = 0;
                    $keterangan_alpha = 0;
                } ?>
            </table>
            <table cellspacing="0" style="width: 100%; text-align: right; font-size: 10pt; margin-top: 10px">
                <tr>
                    <td style="width: 30%"><?= $kop['kota'] ?>, <?= date('d-m-Y') ?></td>
                </tr>
            </table>
            <?php
            $ttd_query = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE jabatan.nama_jabatan='HRD'");
            $ttd = mysqli_fetch_array($ttd_query)
            ?>
            <br>
            <br>
            <p style="text-align: right; font-size: 10pt;"><?= $ttd['nama'] ?></p>
        </div>
    </div>

</body>

</html>