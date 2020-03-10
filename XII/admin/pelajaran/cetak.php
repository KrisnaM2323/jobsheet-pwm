<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

// require_once __DIR__ . '../../vendor/autoload.php';
// <td><img src="img/' . $row["gambar"] . '" ></td>
// <td><img src="../images/gambar_guru/' . $d["foto"] . '" width="100" height="100" ></td>
require_once '../../vendor/autoload.php';

include '../siswa/connect.php';
$data = mysqli_query($connect, "SELECT * from tb_pelajaran")or die(mysqli_error($connect));

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daftar Jurusan</title>
  <link rel="stylesheet" href="../../_assets/css/custom.css"></link>
</head>
<body id="print_body">
  <h1>Data Pelajaran</h1>
  <table border="1" cellpadding="10" cellspacing="0">
                
    <tr id="print_tr">
      <th>NO</th>
      <th>Nama Pelajaran</th>
      <th>Keterangan</th>
    </tr>';

    $no = 1;
    while ($d = mysqli_fetch_array($data)) {
      $html .='<tr id="print_tr">
        <td>'. $no++ .'</td>
        <td>'. $d["nama_pelajaran"] .'</td>
        <td>'. $d["keterangan"] .'</td>
      </tr>';
    }

$html .= '</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-pelajaran.pdf', 'I');

?>