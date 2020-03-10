<?php 
session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}


//query
include '../siswa/connect.php';
$nama_pelajaran = $_POST['nama_pelajaran'];
$keterangan = $_POST['keterangan'];


$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * from tb_pelajaran where nama_pelajaran='$nama_pelajaran'"));
if ($cek > 0) {
    // echo "<script>window.alert('')
    // window.location='../tabel_pelajaran.php'</script>";
header("location: ../tabel_pelajaran.php?pesan=data_ada");

} else {
    mysqli_query($connect, "INSERT INTO tb_pelajaran SET nama_pelajaran='$nama_pelajaran', keterangan='$keterangan'")or die(mysqli_error($connect));
    // echo "<script>window.alert('')
    // window.location='../tabel_pelajaran.php'</script>";
header("location: ../tabel_pelajaran.php?pesan=data_disimpan");

}
?>