<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

include '../siswa/connect.php';

$id_jurusan = $_GET['id_jurusan'];

mysqli_query($connect, "DELETE from table_jurusan where id_jurusan='$id_jurusan'");

// echo "<script>window.alert('Data berhasil dihapus')
// window.location='../tabel_jurusan.php'</script>";

header("location:../tabel_jurusan.php?pesan=data_dihapus");
?>