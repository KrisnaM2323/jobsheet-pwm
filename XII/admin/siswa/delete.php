<?php 
session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}


include 'connect.php';

$id_siswa = $_GET['id_siswa'];


mysqli_query($connect, "DELETE from tb_siswa where id_siswa='$id_siswa'")or die(mysqli_error($connect));

// echo "<script>window.alert('Data berhasil dihapus')
// window.location='../table.php'</script>";
header("location: ../table.php?pesan=data_dihapus");

?>