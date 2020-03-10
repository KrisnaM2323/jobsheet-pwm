<?php 
session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

include '../siswa/connect.php';

$id_pelajaran = $_GET['id_pelajaran'];

mysqli_query($connect, "DELETE from tb_pelajaran where id_pelajaran='$id_pelajaran'");

// echo "<script>window.alert('')
// window.location='../tabel_pelajaran.php'</script>";
header("location: ../tabel_pelajaran.php?pesan=data_dihapus");
?>