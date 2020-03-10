<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

$id_guru = $_GET['id_guru'];


// require_once __DIR__ . '../../vendor/autoload.php';
// <td><img src="img/' . $row["gambar"] . '" ></td>
require_once '../../vendor/autoload.php';

include '../siswa/connect.php';
$data = mysqli_query($connect, "SELECT tb_guru.id_guru, tb_guru.nik, tb_guru.nama, tb_guru.email, tb_pelajaran.id_pelajaran, tb_pelajaran.nama_pelajaran, tb_pelajaran.keterangan, tb_guru.foto, tb_guru.alamat, tb_guru.gender from tb_guru inner join tb_pelajaran on tb_guru.id_pelajaran = tb_pelajaran.id_pelajaran where id_guru='$id_guru'")or die(mysqli_error($connect));

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Guru</title>
  <link rel="stylesheet" href="../../_assets/css/custom.css"></link>
</head>
<body id="print_body">
  <h1>Data Guru</h1>
  <table border="0" cellpadding="10" cellspacing="0">

    <tr id="print_tr">
      <th></th>
      <th></th>';
      while ($d = mysqli_fetch_array($data)) {
      $html .='<th><img src="../../images/gambar_guru/' . $d["foto"] . '" width="100" height="100" ></th>
    </tr>
    
    <tr id="print_tr">
      <td>NIK</td>
      <td>:</td>';
      $html .='<td>'. $d["nik"] .'</td>
    </tr>';

      $html .='<tr id="print_tr">
        <td>Nama</td>
        <td>:</td>
        <td>'. $d["nama"] .'</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>'. $d["email"] .'</td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>'. $d["gender"] .'</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>'. $d["alamat"] .'</td>
      </tr>
      <tr>
        <td>Mata Pelajaran</td>
        <td>:</td>
        <td>'. $d["nama_pelajaran"] .'</td>
      </tr>';
    }

$html .= '</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-guru.pdf', 'I');

?>