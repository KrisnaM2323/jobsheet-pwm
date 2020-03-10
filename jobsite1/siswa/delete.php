<?php
include 'connect.php';

$id_siswa = $_GET['id_siswa'];


mysqli_query($connect, "DELETE from tb_siswa where id_siswa='$id_siswa'")or die(mysqli_error($connect));

// header("location:../table.php");

echo "<script>window.alert('Data berhasil dihapus')
window.location='../table.php'</script>";
