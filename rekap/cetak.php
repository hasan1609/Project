<?php
include '../config/koneksi.php';
include 'akses.php';
require '../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = '
<style>
    table,
    tr,
    th,
    td {
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<table>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">L/P</th>';



for ($tanggal_table = 1; $tanggal_table <= 31; $tanggal_table++) {
    $html .= '<th rowspan="2">' . $tanggal_table . '</th>"';
}

$html .= '
        <th colspan="4">Jumlah</th>
    </tr>
    <tr>
        <th>H</th>
        <th>A</th>
        <th>I</th>
    </tr>
</table>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

// output name file dan new tab
$dompdf->stream("data_absensi.pdf", array("Attachment" => 0));
