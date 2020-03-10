<?php


session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
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
$guru=array();
include '../siswa/connect.php';
$result=mysqli_query($connect, "SELECT tb_guru.id_guru, tb_guru.nik, tb_guru.nama, tb_guru.email, tb_pelajaran.id_pelajaran, tb_pelajaran.nama_pelajaran, tb_guru.foto, tb_guru.alamat, tb_guru.gender from tb_guru inner join tb_pelajaran on tb_guru.id_pelajaran = tb_pelajaran.id_pelajaran");
while($row=mysqli_fetch_array($result)){
  $guru[]=array(
    "ID Guru"         =>$row['id_guru'],
    "NIK"             =>$row['nik'],
    "Nama Guru"       =>$row['nama'],
    "Nama Pelajaran"  =>$row['nama_pelajaran'],
    "File Foto"       =>$row['foto']
  );
}

//  END BLOCK FUNCTION SQL


// TRANSFER KE SYSTEM 

createExcel("guru", $guru);


?>