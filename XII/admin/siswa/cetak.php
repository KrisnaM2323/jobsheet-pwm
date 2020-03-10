<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

// require_once __DIR__ . '../../vendor/autoload.php';
// <td><img src="img/' . $row["gambar"] . '" ></td>
require_once '../../vendor/autoload.php';

include '../siswa/connect.php';
$data = mysqli_query($connect, "SELECT tb_siswa.id_siswa, tb_siswa.nisn, tb_siswa.nama, tb_siswa.email, tb_siswa.tempat_lahir, tb_siswa.foto, tb_siswa.tanggal_lahir, tb_siswa.alamat, tb_siswa.gender, tb_siswa.no_hp, tb_siswa.nama_ayah, tb_siswa.nama_ibu, tb_siswa.agama, tb_siswa.no_hp_ortu, tb_jurusan.nm_jurusan, tbl_kelas.id_kelas, tbl_kelas.nama_kelas, tbl_kelas.tingkatan, tbl_kelas.keterangan from tb_siswa inner join tbl_kelas on tb_siswa.id_kelas = tbl_kelas.id_kelas inner join tb_jurusan on tbl_kelas.id_jurusan = tb_jurusan.id_jurusan")or die(mysqli_error($connect));

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daftar Siswa</title>
  <link rel="stylesheet" href="../../_assets/css/custom.css"></link>
</head>
<body id="print_body">
  <h1>Data Siswa</h1>
  <table border="1" cellpadding="10" cellspacing="0">
                
    <tr id="print_tr">
      <th>NO</th>
      <th>NISN</th>
      <th>Nama</th>
      <th>Email</th>
      <th>TTL</th>
      <th>Alamat</th>
      <th>JK</th>
      <th>Kelas</th>
      <th>No HP</th>
      <th>Agama</th>
      <th>Jurusan</th>
      <th>Foto</th>
    </tr>';

    $no = 1;
    while ($d = mysqli_fetch_array($data)) {
      $html .='<tr id="print_tr">
        <td>'. $no++ .'</td>
        <td>'. $d["nisn"] .'</td>
        <td>'. $d["nama"] .'</td>
        <td>'. $d["email"] .'</td>
        <td>'. $d["tempat_lahir"].', '. $d["tanggal_lahir"] .'</td>
        <td>'. $d["alamat"] .'</td>
        <td>'. $d["gender"] .'</td>
        <td>'. $d["tingkatan"] .'-'. $d["nama_kelas"] .'</td>
        <td>'. $d["no_hp"] .'</td>
        <td>'. $d["agama"] .'</td>
        <td>'. $d["nm_jurusan"] .'</td>
        <td><img src="../../images/gambar_siswa/' . $d["foto"] . '" width="50" height="50" ></td>
      </tr>';
    }

$html .= '</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-siswa.pdf', 'I');

?>