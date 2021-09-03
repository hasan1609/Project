<?php
session_start();
require '../vendor/autoload.php';
include '../config/koneksi.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$page = '
        <div style="margin: 40px;">';

$query_kop = mysqli_query($koneski, "SELECT * FROM profil");
while ($kop = mysqli_fetch_array($query_kop)) {



    $page .= '
            <div class="grid-container" style="display: grid; grid-template-columns: 160px auto;">
                <div class="grid-item">
                    <img src="../Image/' . $kop['gambar'] . '" alt="" width="120px">
                </div>
                <div class="grid-item align-content-center">
                    <p style="text-align:center; font-size: 6vw; margin-top:10px; margin-bottom: 0;; width:auto;">' . $kop["nama"] . '</p>
                    <p style="text-align:center; margin: 0;">' . $kop['alamat'] . ' ?><br>
                        Tlp : ' . $kop['tlp'] . ' | Email :' . $kop['email'] . ' | Fax :' . $kop['tlp'] . '</p>
                </div>
            </div>
            <hr color=" black">
            <hr color="black" style="margin-bottom: 20px;">
            </table>
            <table cellspacing="0" style="width: 100%; text-align: right; font-size: 10pt; margin-top: 10px">
                <tr>
                    <td style="width: 30%">' . $kop["kota"] . ',' . date("d-m-Y") . '</td>
                </tr>
            </table>';
}

// $dompdf->loadHtml($aData['html']);
$dompdf->set_option('isRemoteEnabled', TRUE);
$dompdf->loadHtml($page);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

// output name file dan new tab
$dompdf->stream("data_absensi.pdf", array("Attachment" => 0));
