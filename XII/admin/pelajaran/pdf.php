<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

$id_pelajaran = $_GET['id_pelajaran'];


// require_once __DIR__ . '../../vendor/autoload.php';
// <td><img src="img/' . $row["gambar"] . '" ></td>
// <td><img src="../images/gambar_guru/' . $d["foto"] . '" width="100" height="100" ></td>
require_once '../../vendor/autoload.php';

include '../siswa/connect.php';
$data = mysqli_query($connect, "SELECT * from tb_pelajaran where id_pelajaran='$id_pelajaran'")or die(mysqli_error($connect));

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Pelajaran</title>
  <link rel="stylesheet" href="../../_assets/css/custom.css"></link>
</head>
<body id="print_body">
  <h1>Data Pelajaran</h1>
  <table border="" cellpadding="10" cellspacing="0">
                
    <tr id="print_tr">
      <th></th>
      <th></th>
      <th></th>
    </tr>

    <tr id="print_tr">
      <td>Nama Pelajaran</td>
      <td>:</td>';
      while ($d = mysqli_fetch_array($data)) {
      $html .='<td>'. $d["nama_pelajaran"] .'</td>
    </tr>';

      $html .='<tr id="print_tr">
        <td>Keterangan</td>
        <td>:</td>
        <td>'. $d["keterangan"] .'</td>
      </tr>';
    }

$html .= '</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('data-pelajaran.pdf', 'I');

?>