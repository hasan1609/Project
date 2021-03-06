<?php

include '../config/koneksi.php';

$filename = "absensi(" . $_GET['tahun'] . "-" . $_GET['bulan'] . ").xls";

header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/vnd,,s-excel");

//deklarasi variable absen
$keterangan_alpha = 0;
$keterangan_izin = 0;
$keterangan_hadir = 0;
?>
<!DOCTYPE html>
<html>

<body>
    <?php
    $query_kop = mysqli_query($koneski, "SELECT * FROM profil");
    $kop = mysqli_fetch_array($query_kop)
    ?>

    <h2 style="text-align: center; margin:0; font-size: 20px;"><?= $kop['nama'] ?></h2>
    <h3 style="text-align: center;">Laporan Absensi <?= "$_GET[bulan]/$_GET[tahun]" ?></h3>
    <table cellspacing="0" style="width: 50%;border: solid 1px #000000; font-size: 12pt;">
        <tr>
            <th rowspan="2" style="width: 4%; border: solid 1px #000000;">No</th>
            <th style="width: 10%; border: solid 1px #000000;" rowspan="2">Nama</th>
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
                <td style="width: 10%; border: solid 1px #000000; padding: 5px;"><?php echo strtoupper($data['nama']); ?></td>
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

    <p style="text-align: right; font-size: 10pt;"><?= $kop['kota'] ?>, <?= date('d-m-Y') ?></p>
    <br>


    <?php
    $ttd_query = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE jabatan.nama_jabatan='HRD'");
    $ttd = mysqli_fetch_array($ttd_query)
    ?>
    <p style="text-align: right; font-size: 10pt;"><?= $ttd['nama'] ?></p>

</body>

</html>