<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

$id_kelas = $_GET['id_kelas'];


// require_once __DIR__ . '../../vendor/autoload.php';
// <td><img src="img/' . $row["gambar"] . '" ></td>
// <td><img src="../images/gambar_guru/' . $d["foto"] . '" width="100" height="100" ></td>
require_once '../../vendor/autoload.php';

include '../siswa/connect.php';
$data = mysqli_query($connect, "SELECT tbl_kelas.id_kelas, tbl_kelas.id_jurusan, tbl_kelas.nama_kelas, tbl_kelas.tingkatan, tbl_kelas.keterangan, tb_jurusan.nm_jurusan from tbl_kelas inner join tb_jurusan on tbl_kelas.id_jurusan = tb_jurusan.id_jurusan where id_kelas='$id_kelas'")or die(mysqli_error($connect));

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daftar Kelas</title>
  <link rel="stylesheet" href="../../_assets/css/custom.css"></link>
</head>
<body id="print_body">
  <h1>Data Kelas</h1>
  <table border="0" cellpadding="10" cellspacing="0">

    <tr id="print_tr">
      <th></th>
      <th></th>
      <th></th>
    </tr>

    <tr id="print_tr">
      <td>Nama Kelas</td>
      <td>:</td>';
      while ($d = mysqli_fetch_array($data)) {
      $html .='<td>'. $d["nama_kelas"] .'</td>
    </tr>';

      $html .='<tr id="print_tr">
        <td>Tingkatan</td>
        <td>:</td>
        <td>'. $d["tingkatan"] .'</td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>'. $d["keterangan"] .'</td>
      </tr>
      <tr>
        <td>Jurusan</td>
        <td>:</td>
        <td>'. $d["nm_jurusan"] .'</td>
      </tr>';
    }

$html .= '</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('data-kelas.pdf', 'I');

?>