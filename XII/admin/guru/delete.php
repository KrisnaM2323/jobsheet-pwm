<?php
session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}


include '../siswa/connect.php';

$id_guru = $_GET['id_guru'];


mysqli_query($connect, "DELETE from tb_guru where id_guru='$id_guru'")or die(mysqli_error($connect));

// echo "<script>window.alert('Data berhasil dihapus')
// window.location='../table_g.php'</script>";
header("location: ../table_g.php?pesan=data_dihapus");

?>