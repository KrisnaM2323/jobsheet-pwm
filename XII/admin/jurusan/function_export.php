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
$jurusan=array();
include '../siswa/connect.php';
$result=mysqli_query($connect, "SELECT * from tb_jurusan");
while($row=mysqli_fetch_array($result)){
  $jurusan[]=array(
    "ID Jurusan"=>$row['id_jurusan'],
    "Nama Jurusan"=>$row['nm_jurusan'],
    "Deskripsi"=>$row['deskripsi']
  );
}

//  END BLOCK FUNCTION SQL


// TRANSFER KE SYSTEM 

createExcel("jurusan", $jurusan);


?>