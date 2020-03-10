<?php

session_start();
if($_SESSION['nik']==""){
  header("location: ../../login_guru.php?pesan=bukan_guru");
}

$id_jurusan = $_GET['id_jurusan'];


// require_once __DIR__ . '../../vendor/autoload.php';
// <td><img src="img/' . $row["gambar"] . '" ></td>
// <td><img src="../images/gambar_guru/' . $d["foto"] . '" width="100" height="100" ></td>
require_once '../../vendor/autoload.php';

include '../siswa/connect.php';
$data = mysqli_query($connect, "SELECT * from tb_jurusan where id_jurusan='$id_jurusan'")or die(mysqli_error($connect));

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Jurusan</title>
  <link rel="stylesheet" href="../../_assets/css/custom.css"></link>
</head>
<body id="print_body">
  <h1>Data Jurusan</h1>
  <table border="" cellpadding="10" cellspacing="0">
                
    <tr id="print_tr">
      <th></th>
      <th></th>
      <th></th>
    </tr>

    <tr id="print_tr">
      <td>Nama Jurusan</td>
      <td>:</td>';
      while ($d = mysqli_fetch_array($data)) {
      $html .='<td>'. $d["nm_jurusan"] .'</td>
    </tr>';

      $html .='<tr id="print_tr">
        <td>Deskripsi</td>
        <td>:</td>
        <td>'. $d["deskripsi"] .'</td>
      </tr>';
    }

$html .= '</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('data-jurusan.pdf', 'I');

?>