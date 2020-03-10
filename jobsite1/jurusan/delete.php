<?php
include 'connect.php';

$id_jurusan = $_GET['id_jurusan'];

mysqli_query($connect, "DELETE from table_jurusan where id_jurusan='$id_jurusan'")or die(mysqli_error($connect));

echo "<script>window.alert('Data berhasil dihapus')
window.location='../tabel_jurusan.php'</script>";
