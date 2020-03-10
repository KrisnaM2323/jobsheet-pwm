<?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}


//query
include '../siswa/connect.php';
$nm_jurusan = $_POST['nm_jurusan'];
$deskripsi = $_POST['deskripsi'];


$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * from tb_jurusan where nm_jurusan='$nm_jurusan'"));
if ($cek > 0) {
    // echo "<script>window.alert('Data Sudah Ada')
    // window.location='../tabel_jurusan.php'</script>";
    header("location: ../tabel_jurusan.php?pesan=data_ada");

} else {
    mysqli_query($connect, "INSERT INTO tb_jurusan SET nm_jurusan='$nm_jurusan', deskripsi='$deskripsi'")or die(mysqli_error($connect));
    // echo "<script>window.alert('Data Di Simpan')
    // window.location='../tabel_jurusan.php'</script>";
    header("location: ../tabel_jurusan.php?pesan=data_disimpan");

}
?>