<?php
include '../siswa/connect.php';

session_start();
if($_SESSION['id_user']==""){
  header("location: ../index.php?pesan=bukan_admin");
}


$id_kelas = $_GET['id_kelas'];


mysqli_query($connect, "DELETE from tbl_kelas where id_kelas='$id_kelas'")or die(mysqli_error($connect));

// echo "<script>window.alert('Data berhasil dihapus')
// window.location='../tabel_k.php'</script>";
header("location: ../tabel_k.php?pesan=data_dihapus");
?>