<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

$id_siswa = $_GET['id_siswa'];


// require_once __DIR__ . '../../vendor/autoload.php';
// <td><img src="img/' . $row["gambar"] . '" ></td>
require_once '../../vendor/autoload.php';

include '../siswa/connect.php';
$data = mysqli_query($connect, "SELECT tb_siswa.id_siswa, tb_siswa.nisn, tb_siswa.nama, tb_siswa.email, tb_siswa.tempat_lahir, tb_siswa.foto, tb_siswa.tanggal_lahir, tb_siswa.alamat, tb_siswa.gender, tb_siswa.no_hp, tb_siswa.nama_ayah, tb_siswa.nama_ibu, tb_siswa.agama, tb_siswa.no_hp_ortu, tb_jurusan.nm_jurusan, tbl_kelas.id_kelas, tbl_kelas.nama_kelas, tbl_kelas.tingkatan, tbl_kelas.keterangan from tb_siswa inner join tbl_kelas on tb_siswa.id_kelas = tbl_kelas.id_kelas inner join tb_jurusan on tbl_kelas.id_jurusan = tb_jurusan.id_jurusan where id_siswa='$id_siswa'")or die(mysqli_error($connect));

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Siswa</title>
  <link rel="stylesheet" href="../../_assets/css/custom.css"></link>
</head>
<body id="print_body">
  <h1>Data Siswa</h1>
  <table border="0" cellpadding="10" cellspacing="0">

    <tr id="print_tr">
      <th></th>
      <th></th>';
      while ($d = mysqli_fetch_array($data)) {
      $html .='<th><img src="../../images/gambar_siswa/' . $d["foto"] . '" width="100" height="100" ></th>
    </tr>
    
    <tr id="print_tr">
      <td>NISN</td>
      <td>:</td>
      <td>'. $d["nisn"] .'</td>
    </tr>
    <tr id="print_tr">
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
        <td>Tempat Tanggal Lahir</td>
        <td>:</td>
        <td>'. $d["tempat_lahir"].', '. $d["tanggal_lahir"] .'</td>
      </tr>
      <tr>
        <td>No HP</td>
        <td>:</td>
        <td>'. $d["no_hp"] .'</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td>'. $d["agama"] .'</td>
      </tr>
      <tr>
        <td>Nama Ibu</td>
        <td>:</td>
        <td>'. $d["nama_ibu"] .'</td>
      </tr>
      <tr>
        <td>Nama Ayah</td>
        <td>:</td>
        <td>'. $d["nama_ayah"] .'</td>
      </tr>
      <tr>
        <td>No HP Orang tua</td>
        <td>:</td>
        <td>'. $d["no_hp_ortu"] .'</td>
      </tr>
      <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>'. $d["tingkatan"] .'-'. $d["nama_kelas"] .'</td>
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
$mpdf->Output('data-siswa.pdf', 'I');

?>