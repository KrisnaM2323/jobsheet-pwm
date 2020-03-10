<?php

session_start();
if($_SESSION['nik']==""){
  header("location: ../../login_guru.php?pesan=bukan_guru");
}

// require_once __DIR__ . '../../vendor/autoload.php';
// <td><img src="img/' . $row["gambar"] . '" ></td>
require_once '../../vendor/autoload.php';

include '../siswa/connect.php';
$data = mysqli_query($connect, "SELECT tb_guru.id_guru, tb_guru.nik, tb_guru.nama, tb_guru.email, tb_pelajaran.id_pelajaran, tb_pelajaran.nama_pelajaran, tb_pelajaran.keterangan, tb_guru.foto, tb_guru.alamat, tb_guru.gender from tb_guru inner join tb_pelajaran on tb_guru.id_pelajaran = tb_pelajaran.id_pelajaran")or die(mysqli_error($connect));

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daftar Guru</title>
  <link rel="stylesheet" href="../../_assets/css/custom.css"></link>
</head>
<body id="print_body">
  <h1>Data Guru</h1>
  <table border="1" cellpadding="10" cellspacing="0">
                
    <tr id="print_tr">
      <th>NO</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Nama Pelajaran</th>
      <th>Foto</th>
    </tr>';

    $no = 1;
    while ($d = mysqli_fetch_array($data)) {
      $html .='<tr id="print_tr">
        <td>'. $no++ .'</td>
        <td>'. $d["nik"] .'</td>
        <td>'. $d["nama"] .'</td>
        <td>'. $d["email"] .'</td>
        <td>'. $d["nama_pelajaran"] .'</td>
        <td><img src="../../images/gambar_guru/' . $d["foto"] . '" width="50" height="50" ></td>
      </tr>';
    }

$html .= '</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-guru.pdf', 'I');

?>