<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

  include '../siswa/connect.php';

  $id_jurusan = $_GET['id_jurusan'];
  $nm_jurusan = $_GET['nm_jurusan'];
  $deskripsi = $_GET['deskripsi'];


  $sql = mysqli_query($connect, "UPDATE tb_jurusan set nm_jurusan='$nm_jurusan', deskripsi='$deskripsi' where id_jurusan='$id_jurusan'") or die(mysqli_error($sql));

  // echo "<script>window.alert('Data Di Simpan')
  // window.location='../tabel_jurusan.php'</script>";
  header("location: ../tabel_jurusan.php?pesan=data_diubah");

?>