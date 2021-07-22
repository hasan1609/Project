<?php include '../config/koneksi.php';

//deklarasi variable absen
$keterangan_alpha = 0;
$keterangan_izin = 0;
$keterangan_hadir = 0;
$nama_bulan = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
    'September', 'Oktober', 'November', 'Desember'
];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak laporan</title>
</head>

<body style="margin: 30px;">

    <div class="grid-container" style="
  display: grid;
  grid-template-columns: 160px auto;
">
        <div class="grid-item">
            <img src="../Image/default.png" alt="" width="150px">
        </div>
        <div class="grid-item">
            <p style="text-align: center; margin: 15px 5px 5px 0 ; font-size: 20pt;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam voluptatum enim dolore temporibus dolorum ducimus dolor quibusdam suscipit excepturi. Ullam quo nulla officiis labore et adipisci eos inventore rem error.</p>
        </div>
    </div>
    <hr color="black">
    <hr color="black" style="margin-bottom: 20px;">
    <h2 style="text-align: center;">Laporan Absensi PT SEMBURAT Perbulan</h2>
    <table cellspacing="0" style="padding: 2px; width: 100%; border: solid 2px #000000; font-size: 12pt;">
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
                <td style="width: 8%; border: solid 1px #000000; text-align: center;"><?php echo $no; ?></td>
                <td style="width: 30%; border: solid 1px #000000; padding: 5px;"><?php echo strtoupper($data['nama']); ?></td>
                <td style="width: 8%; border: solid 1px #000000; padding: 5px;"><?php echo strtoupper($data['nama_jabatan']); ?></td>
                <td style="width: 8%; border: solid 1px #000000; padding: 5px;"><?php echo strtoupper($data['jk']); ?></td>
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
            <td style="width: 30%">Pasuruan, <?= date('d-m-Y') ?></td>
        </tr>
    </table>
    <p style="text-align: right; font-size: 10pt;">Percobaan</p>
</body>

</html>