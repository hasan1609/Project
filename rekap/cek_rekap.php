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

<body>


    <table cellspacing="0" style="padding: 1px; width: 100%; border: solid 2px #000000; font-size: 12pt;">
        <tr>
            <th rowspan="2" style="width: 8%; border: solid 1px #000000;">No</th>
            <th style="width: 8%; border: solid 1px #000000;" rowspan="2">Nama</th>
            <th style="width: 30%; border: solid 1px #000000;" rowspan="2">Jabatan</th>
            <th style="width: 8%; border: solid 1px #000000;" rowspan="2">L/P</th>
            <?php for ($tanggal_table = 1; $tanggal_table <= 31; $tanggal_table++) {
                echo "<th style='width: 8%; border: solid 1px #000000;'rowspan='2'>$tanggal_table</th>";
            } ?>
            <th style="width: 32%; border: solid 1px #000000;" colspan="3">
                <p align="center">Jumlah</p>
            </th>
            <th style="width: 8%; border: solid 1px #000000;" rowspan="2">
                <p align="center">Jumlah</p>
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
            //cek bulan
            if ($_GET['bulan'] < 10) {
                $bulan = "0" . $_GET['bulan'];
            } else {
                $bulan = $_GET['bulan'];
            }
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
                <th style="width: 8%; border: solid 1px #000000;"><?php echo $no; ?></th>
                <td style="width: 30%; border: solid 1px #000000;"><?php echo strtoupper($data['nama']); ?></td>
                <td style="width: 8%; border: solid 1px #000000;"><?php echo strtoupper($data['nama_jabatan']); ?></td>
                <td style="width: 8%; border: solid 1px #000000;"><?php echo strtoupper($data['jk']); ?></td>
                <?php
                $nomor2 = 1;
                $query_tampil_tanggal = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan=$data[id_karyawan] and tgl_absen like '%$_GET[tahun]-$_GET[bulan]%' ORDER BY tgl_absen ASC;");
                while ($data_tanggal = mysqli_fetch_array($query_tampil_tanggal)) {
                    //mengabil tanggal
                    $ambil_tanggal = explode("-", $data_tanggal['tgl_absen']);
                    //merubah menjadi tanggal jadi integer
                    $ambil_tanggal[2] = (int)$ambil_tanggal[2];

                    //perulangan kehadiran sesuai tanggal
                    for ($nomor = $nomor2; $nomor <= $ambil_tanggal[2]; $nomor++) {
                        if ($nomor == $ambil_tanggal[2]) {
                            echo "<td style='width: 8%; border: solid 1px #000000;'><b>" . strtoupper($data_tanggal['keterangan']) . "</b></td>";
                        } else {
                            echo "<td style='width: 8%; border: solid 1px #000000;'></td>";
                        }
                    }
                    //meng rekap bulannan
                    $nomor2 = $ambil_tanggal[2] + 1;
                    $sisa_td = 31 - $nomor2;
                }
                if (isset($sisa_td) != true) {
                    $sisa_td = 30;
                }
                for ($td = 0; $td <= $sisa_td; $td++) {
                    echo "<td style='width: 8%; border: solid 1px #000000;'></td>";
                }
                $sisa_td = 0;
                ?>
                <td style="width: 8%; border: solid 1px #000000;"><?php echo $keterangan_hadir; ?></td>
                <td style="width: 8%; border: solid 1px #000000;"><?php echo $keterangan_alpha; ?></td>
                <td style="width: 8%; border: solid 1px #000000;"><?php echo $keterangan_izin; ?></td>
                <?php $total = $keterangan_hadir + $keterangan_alpha + $keterangan_izin;
                echo '<td style="width: 8%; border: solid 1px #000000;"><p align="center">' . $total . '</p></td>'; ?>
            </tr>
        <?php $no++;
            $keterangan_hadir = 0;
            $keterangan_izin = 0;
            $keterangan_alpha = 0;
        } ?>
    </table>
    <?php
    echo '<table cellspacing="0" style="width: 100%; text-align: center; font-size: 10pt">
                     <tr>
                         <td style="width: 30%">Pasuruan, ' . date('d-m-Y') . '</td>
                         <td style="width: 40%"></td>
                         <td style="width: 30%">Pasuruan, ' . date('d-m-Y') . '</td>
                     </tr>
                 </table>';
    ?>
</body>

</html>