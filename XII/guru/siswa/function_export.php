<?php
session_start();
if($_SESSION['nik']==""){
  header("location: ../../login_guru.php?pesan=bukan_guru");
}

function cleanDataExcel(&$str){
  $str = preg_replace("/\t/", "\\t", $str);
  $str = preg_replace("/\r?\n/", "\\n", $str);
  if($str == 't') $str = 'TRUE';
  if($str == 'f') $str = 'FALSE';
  if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) ||preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
    $str = "'$str";
  }
  if(strstr($str, '"')) $str = '"' . str_replace('"', '"', $str) . '"';
}

function createExcel($filename, $array){
  // filename download
  $filename = $filename.".xls";
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
  $flag = false;
  foreach($array as $row){
    if(!$flag){
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, 'cleanDataExcel');
    echo implode("\t", array_values($row)) . "\r\n";
  }
  return;
}
// END OF - BLOCK FUNCTION EXCEL

// BLOCK FUNCTION SQL
$siswa=array();
include 'connect.php';
$result=mysqli_query($connect, "SELECT tb_siswa.id_siswa, tb_siswa.nisn, tb_siswa.nama, tb_siswa.email, tb_siswa.tempat_lahir, tb_siswa.foto, tb_siswa.tanggal_lahir, tb_siswa.alamat, tb_siswa.gender, tb_siswa.no_hp, tb_siswa.nama_ayah, tb_siswa.nama_ibu, tb_siswa.agama, tb_siswa.no_hp_ortu, table_jurusan.nm_jurusan, tbl_kelas.id_kelas, tbl_kelas.nama_kelas, tbl_kelas.tingkatan, tbl_kelas.keterangan from tb_siswa inner join tbl_kelas on tb_siswa.id_kelas = tbl_kelas.id_kelas inner join table_jurusan on tbl_kelas.id_jurusan = table_jurusan.id_jurusan");
while($row=mysqli_fetch_array($result)){
  $siswa[]=array(
    "ID Siswa"     =>$row['id_siswa'],
    "NISN"         =>$row['nisn'],
    "Nama siswa"   =>$row['nama'],
    "Email"        =>$row['email'],
    "Tempat Lahir" =>$row['tempat_lahir'],
    "Tanggal Lahir"=>$row['tanggal_lahir'],
    "Alamat"       =>$row['alamat'],
    "Jenis Kelamin"=>$row['gender'],
    "Nomor HP"     =>$row['no_hp'],
    "Agama"        =>$row['agama'],
    "Nama Jurusan" =>$row['nm_jurusan'],
    "Tingkatan"    =>$row['tingkatan'],
    "Kelas"        =>$row['nama_kelas'],
    "File Foto"    =>$row['foto']
  );
}

//  END BLOCK FUNCTION SQL


// TRANSFER KE SYSTEM 

createExcel("siswa.xls", $siswa);


?>