<?php

// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'admin/siswa/connect.php';

if(isset($_POST['login_admin']))
{


// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
// $nama = $_POST['nama'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect, "SELECT * from tb_admin where username='$username' AND password='$password'")or die(mysqli_error($connect));
// menghitung jumlah data yang ditemukan

$data = mysqli_fetch_array($login);
$username = $data['username'];
$id_level = $data['id_level'];
$nama = $data['nama'];
$id_user = $data['id_user'];
// cek apakah username dan password ditemukan pada database

if(mysqli_num_rows($login)> 0)
{

  // session_start();
  $_SESSION['username'] = $username;
  $_SESSION['id_level'] = $id_level;
  $_SESSION['nama'] = $nama;
  $_SESSION['id_user'] = $id_user;

  header("location:admin/menu_khusus.php");
  
  }else{
    header("location: index.php?pesan=gagal");
  }

// sebagai guru
}else if(isset($_POST['login_guru']))
{


// menangkap data yang dikirim dari form login
$nik = $_POST['nik'];
// $nama = $_POST['nama'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect, "SELECT * from tb_guru where nik='$nik'")or die(mysqli_error($connect));
// menghitung jumlah data yang ditemukan

$data = mysqli_fetch_array($login);
$nik = $data['nik'];
$id_guru = $data['id_guru'];
$id_pelajaran = $data['id_pelajaran'];
$nama = $data['nama'];
$email = $data['email'];
$alamat = $data['alamat'];
$foto = $data['foto'];
$gender = $data['gender'];
$no_hp = $data['no_hp'];
// cek apakah nik dan password ditemukan pada database

if(mysqli_num_rows($login)> 0)
{

  // session_start();
  $_SESSION['nik'] = $nik;
  $_SESSION['id_pelajaran'] = $id_pelajaran;
  $_SESSION['nama'] = $nama;
  $_SESSION['id_guru'] = $id_guru;
  $_SESSION['email'] = $email;
  $_SESSION['alamat'] = $alamat;
  $_SESSION['gender'] = $gender;
  $_SESSION['foto'] = $foto;
  $_SESSION['no_hp'] = $no_hp;

  header("location:guru/menu_khusus.php");
  
  }else{
    header("location: login_guru.php?pesan=gagal");
  }



// sebagai siswa
}else if(isset($_POST['login_siswa']))
{


// menangkap data yang dikirim dari form login
$nisn = $_POST['nisn'];
// $nama = $_POST['nama'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect, "SELECT * from tb_siswa where nisn='$nisn'")or die(mysqli_error($connect));
// menghitung jumlah data yang ditemukan

$data = mysqli_fetch_array($login);
$nisn = $data['nisn'];
$id_siswa = $data['id_siswa'];
$id_kelas = $data['id_kelas'];
$nama = $data['nama'];
$email = $data['email'];
$alamat = $data['alamat'];
$foto = $data['foto'];
$gender = $data['gender'];
$no_hp = $data['no_hp'];
$no_hp_ortu = $data['no_hp_ortu'];
$agama = $data['agama'];
$nama_ayah = $data['nama_ayah'];
$nama_ibu = $data['nama_ibu'];
$tempat_lahir = $data['tempat_lahir'];
$tanggal_lahir = $data['tanggal_lahir'];
// cek apakah nik dan password ditemukan pada database

if(mysqli_num_rows($login)> 0)
{

  // session_start();
  $_SESSION['nisn'] = $nisn;
  $_SESSION['id_kelas'] = $id_kelas;
  $_SESSION['nama'] = $nama;
  $_SESSION['id_siswa'] = $id_siswa;
  $_SESSION['email'] = $email;
  $_SESSION['alamat'] = $alamat;
  $_SESSION['gender'] = $gender;
  $_SESSION['foto'] = $foto;
  $_SESSION['no_hp'] = $no_hp;
  $_SESSION['tempat_lahir'] = $tempat_lahir;
  $_SESSION['tanggal_lahir'] = $tanggal_lahir;

  header("location:siswa/menu_khusus.php");
  
  }else{
    header("location: login_siswa.php?pesan=gagal");
  }
}


?>