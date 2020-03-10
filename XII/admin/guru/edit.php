<?php 
session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}


include '../siswa/connect.php';

$id_guru = $_POST['id_guru'];
$nik = $_POST['nik'];


$nama = $_POST['nama'];
$email = $_POST['email'];
$id_pelajaran = $_POST['id_pelajaran'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];
$no_hp = $_POST['no_hp'];




// cek ubah foto
if (isset($_POST['ubah_foto'])) { //jika ceklis
  //ambil foto
  $img_name = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];

  //rename
  $fotobaru = date('dmYHis') . $img_name;

  // path
  $path = "../../images/gambar_guru/" . $fotobaru;


  // upload
  if (move_uploaded_file($tmp, $path)) { //cek gambar berhasil

    //nis
    $query = "SELECT * FROM tb_guru where nik='" . $nik . "'";
    $sql = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($sql);


    //cek foto sebelumnya
    if (is_file("../../images/gambar_guru/" . $data['foto']))
      unlink("../../images/gambar_guru/" . $data['foto']); //hapus foto

    //proses ubah ke database
    $query = "UPDATE tb_guru set id_pelajaran='$id_pelajaran', nik='$nik', nama='$nama', email='$email', alamat='$alamat', gender='$gender', no_hp='$no_hp', foto='$fotobaru' where nik='$nik'";

    $sql = mysqli_query($connect, $query)or die(mysqli_error($connect)); //execute query




    if ($sql) { //cek jika proses masuk ke databse
      // echo "<script>window.alert('Data Diubah')</script>";
      // echo "<script>window.location='../table_g.php'</script>";
      header("location: ../table_g.php?pesan=data_diubah");
    } else {
      // echo "<script>window.alert('')</script>";
      // echo "<script>window.location='../table_g.php'</script>";
      header("location: ../table_g.php?pesan=gagal_diubah");
    }
  } else {
    // echo "<script>window.alert('')</script>";
    // echo "<script>window.location='../table_g.php'</script>";
    header("location: ../table_g.php?pesan=gambar_gagal");
  }
} else {
  // jika tidak di ceklis
  $query = "UPDATE tb_guru set id_pelajaran='$id_pelajaran', nik='$nik', nama='$nama', email='$email', alamat='$alamat', gender='$gender', no_hp='$no_hp' where nik='$nik'";

  $sql = mysqli_query($connect, $query)or die(mysqli_error($connect)); //execute query

  if ($sql) { //cek jika proses masuk ke databse
    // echo "<script>window.alert('Data Diubah')</script>";
    // echo "<script>window.location='../table_g.php'</script>";
    header("location: ../table_g.php?pesan=data_diubah");
  } else {
    // echo "<script>window.alert('Data Gagal Diubah')</script>";
    // echo "<script>window.location='../table_g.php'</script>";
    header("location: ../table_g.php?pesan=gagal_diubah");
  }
}
?>