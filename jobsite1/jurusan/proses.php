<?php

//query
include '../siswa/connect.php';
$nm_jurusan = $_POST['nm_jurusan'];
$deskripsi = $_POST['deskripsi'];

// var_dump($nama_file);
// var_dump($file_tmp);

$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * from table_jurusan where nm_jurusan='$nm_jurusan'")or die(mysqli_error($connect)));
if ($cek > 0) {
    echo "<script>window.alert('Data Sudah Ada')
    window.location='../tabel_jurusan.php'</script>";
} else {
    mysqli_query($connect, "INSERT INTO table_jurusan SET nm_jurusan='$nm_jurusan', deskripsi='$deskripsi'")or die(mysqli_error($connect));
    echo "<script>window.alert('Data Di Simpan')
    window.location='../tabel_jurusan.php'</script>";
}
?>