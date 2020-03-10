<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

include '../siswa/connect.php';

$id_pelajaran = $_GET['id_pelajaran'];

$nama_pelajaran = $_GET['nama_pelajaran'];
$keterangan = $_GET['keterangan'];

$query = mysqli_query($connect, "UPDATE tb_pelajaran set nama_pelajaran='$nama_pelajaran', keterangan='$keterangan' where id_pelajaran='$id_pelajaran'")or die(mysqli_error($connect));

// echo "<script>window.alert('Data Di Simpan')
// window.location='../tabel_pelajaran.php'</script>";
header("location: ../tabel_pelajaran.php?pesan=data_diubah");

?>