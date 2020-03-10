<?php
include 'connect.php';

$id_siswa = $_POST['id_siswa'];
$nisn = $_POST['nisn'];


$nama = $_POST['nama'];
$email = $_POST['email'];
$id_kelas = $_POST['id_kelas'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];
$no_hp = $_POST['no_hp'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$agama = $_POST['agama'];
$no_hp_ortu = $_POST['no_hp_ortu'];




// cek ubah foto
if (isset($_POST['ubah_foto'])) { //jika ceklis
  //ambil foto
  $img_name = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];

  //rename
  $fotobaru = date('dmYHis') . $img_name;

  // path
  $path = "../../images/gambar_siswa/" . $fotobaru;


  // upload
  if (move_uploaded_file($tmp, $path)) { //cek gambar berhasil

    //nis
    $query = "SELECT * FROM siswa where nisn='" . $nisn . "'";
    $sql = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($sql);


    //cek foto sebelumnya
    if (is_file("../../images/gambar_siswa/" . $data['foto']))
      unlink("../../images/gambar_siswa/" . $data['foto']); //hapus foto

    //proses ubah ke database
    $query = "UPDATE tb_siswa set id_kelas='$id_kelas', nisn='$nisn', nama='$nama', email='$email', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat',gender='$gender', no_hp='$no_hp', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', agama='$agama', no_hp_ortu='$no_hp_ortu', foto='$fotobaru' where nisn='$nisn'";

    $sql = mysqli_query($connect, $query); //execute query




    if ($sql) { //cek jika proses masuk ke databse
      echo "<script>window.alert('Data Sudah Diubah')</script>";
      echo "<script>window.location='../table.php'</script>";
    } else {
      echo "<script>window.alert('Data Gagal Diubah')</script>";
      echo "<script>window.location='../table.php'</script>";
    }
  } else {
    echo "<script>window.alert('Gambar gagal Diubah')</script>";
    echo "<script>window.location='../table.php'</script>";
  }
} else {
  // jika tidak di ceklis
  $query = "UPDATE tb_siswa set id_kelas='$id_kelas', nisn='$nisn', nama='$nama', email='$email', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat',gender='$gender', no_hp='$no_hp', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', agama='$agama', no_hp_ortu='$no_hp_ortu' where nisn='$nisn'";

  $sql = mysqli_query($connect, $query); //execute query

  if ($sql) { //cek jika proses masuk ke databse
    echo "<script>window.alert('Data Sudah Diubah')</script>";
    echo "<script>window.location='../table.php'</script>";
  } else {
    echo "<script>window.alert('Data Gagal Diubah')</script>";
    echo "<script>window.location='../table.php'</script>";
  }
}
