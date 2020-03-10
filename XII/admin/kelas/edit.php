<?php


session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}


include '../siswa/connect.php';

$id_kelas = $_GET['id_kelas'];

$id_jurusan = $_GET['id_jurusan'];
$nama_kelas = $_GET['nama_kelas'];
$tingkatan = $_GET['tingkatan'];
$keterangan = $_GET['keterangan'];




$query = mysqli_query($connect, "UPDATE tbl_kelas set id_jurusan='$id_jurusan', nama_kelas='$nama_kelas', tingkatan='$tingkatan', keterangan='$keterangan' where id_kelas='$id_kelas'");



// echo "<script>window.alert('Data Di Simpan')
// window.location='../tabel_k.php'</script>";

header("location: ../tabel_k.php?pesan=data_diubah");


?>