<?php

//query
include 'connect.php';
$id_jurusan = $_POST['id_jurusan'];
$nama_kelas = $_POST['nama_kelas'];
$tingkatan = $_POST['tingkatan'];
$keterangan = $_POST['keterangan'];

// var_dump($nama_file);
// var_dump($file_tmp);


$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * from tbl_kelas where nama_kelas='$nama_kelas' AND tingkatan= '$tingkatan' AND id_jurusan='$id_jurusan'")or die(mysqli_error($connect)));
if ($cek > 0) {
  echo "<script>window.alert('Data Sudah Ada')
    window.location='../tabel_k.php'</script>";
} else {
  mysqli_query($connect, "INSERT INTO tbl_kelas SET id_jurusan='$id_jurusan', nama_kelas= '$nama_kelas', tingkatan='$tingkatan', keterangan='$keterangan'")or die(mysqli_error($connect));
  echo "<script>window.alert('Data Di Simpan')
    window.location='../tabel_k.php'</script>";
}
