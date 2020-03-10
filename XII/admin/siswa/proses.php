  <?php

session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}

  //query
  include 'connect.php';
  $nisn = $_POST['nisn'];
  $nama = $_POST['nama'];
  $id_kelas = $_POST['id_kelas'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $gender = $_POST['gender'];
  $no_hp = $_POST['no_hp'];
  $nama_ayah = $_POST['nama_ayah'];
  $nama_ibu = $_POST['nama_ibu'];
  $agama = $_POST['agama'];
  $no_hp_ortu = $_POST['no_hp_ortu'];

  $nama_file = $_FILES["img"]["name"];
  $file_tmp = $_FILES['img']['tmp_name'];
  $path = "../../images/gambar_siswa/$nama_file";

  move_uploaded_file($file_tmp, $path);

  var_dump($nama_file);
  var_dump($file_tmp);

  //cara 2
  $cek = mysqli_num_rows(mysqli_query($connect, "SELECT * from tb_siswa where nisn='$nisn'")or die(mysqli_error($connect)));
  if ($cek > 0) {
    // echo "<script>window.alert('Data Sudah Ada')
    // window.location='../table.php'</script>";
    // echo "salah apanya";
    header("location: ../table.php?pesan=data_ada");

  } else {
    $query =mysqli_query($connect, "INSERT INTO tb_siswa SET id_kelas='$id_kelas', nisn='$nisn', nama='$nama', email='$email', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', gender='$gender', no_hp='$no_hp', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', agama='$agama', no_hp_ortu='$no_hp_ortu', foto='$nama_file'")or die(mysqli_error($connect));
    // echo "<script>window.alert('Data Di Simpan')
    // window.location='../table.php'</script>";
    header("location: ../table.php?pesan=data_disimpan");

    // var_dump($connect);

    // echo "hmmm";
  }
  // mysqli_close($connect);



  // header("location:../table.php");

  ?>