<?php


session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}


// Bawaan Library

/**    PHPExcel root directory */ 
if (!defined('PHPEXCEL_ROOT')) {
  /**
   * @ignore
   */
  define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../');
  require(PHPEXCEL_ROOT . '../_assets/libs/vendor/phpoffice/phpexcel/Classes/PHPExcel/Autoloader.php');
}
include '../siswa/connect.php';
include '../../_assets/libs/vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
include '../../_assets/libs/vendor/phpoffice/phpexcel/Classes/PHPExcel/Reader/Excel2007.php';

require_once "../../_config/config.php";
require "../../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
Use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// Akhir Library



if(isset($_POST['import'])){
  $file = $_FILES['file']['name'];
  $ekstensi = explode(".", $file);
  $file_name = "file-".round(microtime(true)).".".end($ekstensi);
  $sumber = $_FILES['file']['tmp_name'];
  $target_dir = "../../_file/";
  $target_file = $target_dir.$file_name;
  move_uploaded_file($sumber, $target_file);
  
  $obj = PHPExcel_IOFactory::load($target_file);
  $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

  $i=3;
  while ($i <= count($all_data)) {    
    $nik      		 = $all_data[$i]['A'];
    $nama          = $all_data[$i]['B'];
    $id_pelajaran  = $all_data[$i]['C'];
    $alamat        = $all_data[$i]['D'];
    $gender        = $all_data[$i]['E'];
    $no_hp         = $all_data[$i]['F'];
    $email         = $all_data[$i]['G'];
    $foto          = $all_data[$i]['H'];

    $sql = "INSERT INTO tb_guru SET nik='$nik', nama='$nama', id_pelajaran='$id_pelajaran', alamat='$alamat', gender='$gender', no_hp='$no_hp', email='$email', foto='$foto'";
    mysqli_query($connect, $sql) or die (mysqli_error($connect));
    
    $i++;
  }

    

  //TODO echo $all_data[3]['C'];

  // echo $sql;

  unlink($target_file);
  // echo "<script>window.alert('mengimport File Excel')</script>";
  // echo "<script>window.location='../table_g.php'</script>";
  header("location: ../table_g.php?pesan=import_excel");

}

?>