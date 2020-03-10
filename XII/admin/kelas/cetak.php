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
$data = mysqli_query($connect, "SELECT tbl_kelas.id_kelas, tbl_kelas.id_jurusan, tbl_kelas.nama_kelas, tbl_kelas.tingkatan, tbl_kelas.keterangan, tb_jurusan.nm_jurusan from tbl_kelas inner join tb_jurusan on tbl_kelas.id_jurusan = tb_jurusan.id_jurusan")or die(mysqli_error($connect));

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
      <th>Nama Kelas</th>
      <th>Tingkatan</th>
      <th>Keterangan</th>
      <th>Nama Jurusan</th>
    </tr>';

    $no = 1;
    while ($d = mysqli_fetch_array($data)) {
      $html .='<tr id="print_tr">
        <td>'. $no++ .'</td>
        <td>'. $d["nama_kelas"] .'</td>
        <td>'. $d["tingkatan"] .'</td>
        <td>'. $d["keterangan"] .'</td>
        <td>'. $d["nm_jurusan"] .'</td>
      </tr>';
    }

$html .= '</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-kelas.pdf', 'I');

?>