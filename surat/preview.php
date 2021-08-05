<?php include '../config/koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Preview Surat SP</title>
</head>

<body style="margin: 40px 150px 40px 150px;">
    <div class="container">
        <?php
        $query_kop = mysqli_query($koneski, "SELECT * FROM profil");
        $kop = mysqli_fetch_array($query_kop);

        $ttd_query = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE jabatan.nama_jabatan='HRD'");
        $ttd = mysqli_fetch_array($ttd_query);

        ?>

        <div class="grid-container" style="display: grid; grid-template-columns: 160px auto;">
            <div class="grid-item">
                <img src="../Image/<?= $kop['gambar'] ?>" alt="" width="120px">
            </div>
            <div class="grid-item">
                <p style="text-align: center; margin:0; font-size: 6vw; width:auto;"><?= $kop['nama'] ?></p>
            </div>
        </div>
        <hr color="black">
        <hr color="black" style="margin-bottom: 20px;">
        <?php
        $query_surat = mysqli_query($koneski, "SELECT * FROM template WHERE id = '$_GET[id]'");
        $surat = mysqli_fetch_array($query_surat)
        ?>
        <Table>
            <tr>
                <td>NO</td>
                <td></td>
                <td>:</td>
                <td></td>
                <td>0000/HRD/SP/RMS/VI/<?= date('Y') ?></td>
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
            <strong>AKU DEWE
                <br>
                (DEPT KEUANGAN)</strong>
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
                <td><strong>Akuuuuu</strong></td>
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
        <p style="text-align: right; font-size: 10pt;"><Strong><?= $ttd['nama'] ?></Strong><br>(Saff HRD)</p>
    </div>
</body>

</html>
<style>
    .container {
        padding: 10px;
        border: 2px solid black;
    }
</style>