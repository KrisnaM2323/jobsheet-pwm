<?php


session_start();
if($_SESSION['nik']==""){
  header("location: ../login_guru.php?pesan=bukan_guru");
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
$kelas=array();
include '../siswa/connect.php';
$result=mysqli_query($connect, "SELECT tbl_kelas.id_kelas, tbl_kelas.id_jurusan, tbl_kelas.nama_kelas, tbl_kelas.tingkatan, tbl_kelas.keterangan, table_jurusan.nm_jurusan from tbl_kelas inner join table_jurusan on tbl_kelas.id_jurusan = table_jurusan.id_jurusan");
while($row=mysqli_fetch_array($result)){
  $kelas[]=array(
    "ID Kelas"    =>$row['id_kelas'],
    "Nama Kelas"  =>$row['nama_kelas'],
    "Tingkatan"   =>$row['tingkatan'],
    "Keterangan"  =>$row['keterangan'],
    "Nama Jurusan"=>$row['nm_jurusan']
  );
}

//  END BLOCK FUNCTION SQL


// TRANSFER KE SYSTEM 

createExcel("kelas", $kelas);


?>