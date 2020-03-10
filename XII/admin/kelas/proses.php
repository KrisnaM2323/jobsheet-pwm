<?php


session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}


//query
include '../siswa/connect.php';
$id_jurusan = $_POST['id_jurusan'];
$nama_kelas = $_POST['nama_kelas'];
$tingkatan = $_POST['tingkatan'];
$keterangan = $_POST['keterangan'];


$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * from tbl_kelas where nama_kelas='$nama_kelas' AND tingkatan= '$tingkatan' AND id_jurusan='$id_jurusan'"));
if ($cek > 0) {
  // echo "<script>window.alert('Data Sudah Ada')
  //   window.location='../tabel_k.php'</script>";
header("location: ../tabel_k.php?pesan=data_ada");

} else {
  mysqli_query($connect, "INSERT INTO tbl_kelas SET id_jurusan='$id_jurusan', nama_kelas= '$nama_kelas', tingkatan='$tingkatan', keterangan='$keterangan'");
  // echo "<script>window.alert('Data Di Simpan')
  //   window.location='../tabel_k.php'</script>";
header("location: ../tabel_k.php?pesan=data_disimpan");

}
