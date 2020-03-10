  <?php


session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}


  //query
  include '../siswa/connect.php';
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $id_pelajaran = $_POST['id_pelajaran'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $gender = $_POST['gender'];
  $no_hp = $_POST['no_hp'];

  $nama_file = $_FILES["img"]["name"];
  $file_tmp = $_FILES['img']['tmp_name'];
  $path = "../../images/gambar_guru/$nama_file";

  move_uploaded_file($file_tmp, $path);

  // var_dump($nik);
  // var_dump($nama);
  // var_dump($id_pelajaran);
  // var_dump($email);
  // var_dump($alamat);
  // var_dump($gender);
  // var_dump($no_hp);

  // var_dump($nama_file);
  // var_dump($file_tmp);

  //cara 2
  $cek = mysqli_num_rows(mysqli_query($connect, "SELECT * from tb_guru where nik='$nik'"));
  if ($cek > 0) {
    // echo "<script>window.alert('Data Sudah Ada')
    // window.location='../table_g.php'</script>";
    header("location: ../table_g.php?pesan=data_ada");

  } else {
    mysqli_query($connect, "INSERT INTO tb_guru SET id_pelajaran='$id_pelajaran', nik='$nik', nama='$nama', email='$email', alamat='$alamat', gender='$gender', no_hp='$no_hp', foto='$nama_file'")or die(mysqli_error($connect));
    // echo "<script>window.alert('Data Di Simpan')
    // window.location='../table_g.php'</script>";
    header("location: ../table_g.php?pesan=data_disimpan");

  }
?>