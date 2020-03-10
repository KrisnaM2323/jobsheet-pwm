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
include 'connect.php';
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
    $id_kelas      = $all_data[$i]['A'];
    $nisn          = $all_data[$i]['B'];
    $nama          = $all_data[$i]['C'];
    $email         = $all_data[$i]['D'];
    $tempat_lahir  = $all_data[$i]['E'];
    $tanggal_lahir = $all_data[$i]['F'];
    $alamat        = $all_data[$i]['G'];
    $gender        = $all_data[$i]['H'];
    $no_hp         = $all_data[$i]['I'];
    $nama_ayah     = $all_data[$i]['J'];
    $nama_ibu      = $all_data[$i]['K'];
    $agama         = $all_data[$i]['L'];
    $no_hp_ortu    = $all_data[$i]['M'];
    $foto          = $all_data[$i]['N'];

    $sql = "INSERT INTO tb_siswa SET id_kelas='$id_kelas', nisn='$nisn', nama='$nama', email='$email', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', gender='$gender', no_hp='$no_hp', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', agama='$agama', no_hp_ortu='$no_hp_ortu', foto='$foto'";
    mysqli_query($connect, $sql) or die (mysqli_error($connect));
    
    $i++;
  }

    

  //TODO echo $all_data[3]['C'];

  // echo $sql;

  unlink($target_file);
  // echo "<script>window.alert('mengimport File Excel')</script>";
  // echo "<script>window.location='../table.php'</script>";
  header("location: ../table.php?pesan=import_excel");

}

?>