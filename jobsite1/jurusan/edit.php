<?php
  include 'connect.php';

  $id_jurusan = $_GET['id_jurusan'];
  $nm_jurusan = $_GET['nm_jurusan'];
  $deskripsi = $_GET['deskripsi'];


  $sql = mysqli_query($connect, "UPDATE table_jurusan set nm_jurusan='$nm_jurusan', deskripsi='$deskripsi' where id_jurusan='$id_jurusan'") or die(mysqli_error($connect));

  echo "<script>window.alert('Data Di Simpan')
  window.location='../tabel_jurusan.php'</script>";
?>