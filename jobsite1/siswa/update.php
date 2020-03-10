<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- My CSS -->

  <link rel="stylesheet" href="../custom.css">

  <title>Edit Siswa</title>
</head>

<body class="bg-success">


  <!-- Navbar -->


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="menu.php">Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="#"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
          <a class="nav-item nav-link" href="../tabel_jurusan.php" class="">Tabel Jurusan</a>
          <a class="nav-item nav-link" href="#" class=""><span>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
          <a class="nav-item nav-link" href="../tabel_k.php">Tabel Kelas <span class="sr-only"></span></a>
          <a class="nav-item nav-link" href="#" class=""><span>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
          <a class="nav-item nav-link" href="../table.php" class="">Tabel Siswa</a>
        </div>
      </div>
    </div>
  </nav>


  <!-- Akhir Navbar -->


  <!-- Content -->

  <section class="bawahan">
    <div class="content" id="content">
      <div class="container">
        <div class="col-4 marginator kanan">


          <?php
          include 'connect.php';

          $id_siswa = $_GET['id_siswa'];
          $data = mysqli_query($connect, "SELECT * from tb_siswa where id_siswa='$id_siswa' ")or die(mysqli_error($connect));
          while ($d = mysqli_fetch_array($data)) {

            ?>

            <div class="card">
              <div class="card-header bg-primary text-white">
                Ubah Data Siswa
              </div>
              <div class="card-body" style="background-color: #ccccff;">


                <form method="POST" action="edit.php" enctype="multipart/form-data">


                  <div class="form-row">
                    <label for="validationDefault01" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="hidden" class="form-control" name="id_siswa" value="<?= $d['id_siswa']; ?>">
                      <input type="hidden" class="form-control" name="nisn" value="<?= $d['nisn']; ?>">
                      <input type="text" class="form-control" id="nama validationDefault01" name="nama" value="<?php echo $d['nama']; ?>"><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label class="col-sm-4 col-form-label">Kelas</label>
                    <div class="col-sm-8">
                      <select name="id_kelas" id="validationDefault02" class="form-control">
                        <option value="">-- Pilih Kelas --</option>
                        <?php
                          include 'connect.php';
                          $data = mysqli_query($connect, "SELECT * from tbl_kelas")or die(mysqli_error($connect));
                          while ($data2 = mysqli_fetch_array($data)) {
                            ?>
                          <option value="<?= $data2["id_kelas"]; ?>" <?= $d['id_kelas'] === $data2['id_kelas'] ? "selected" : "" ?>> <?= $data2["tingkatan"]; ?>-<?= $data2["nama_kelas"]; ?></option>
                        <?php } ?>
                      </select><br>
                    </div>
                  </div>


                  <div class="form-row">
                    <label for="validationDefault03" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="inputEmail3 validationDefault03" name="email" value="<?= $d['email']; ?>" required><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="validationDefault04" class="col-sm-4 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="validationDefault04" name="tempat_lahir" value="<?php echo $d['tempat_lahir']; ?>"><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="validationDefault05" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="validationDefault05" name="tanggal_lahir" value="<?php echo $d['tanggal_lahir']; ?>"><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="validationDefault06" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="alamat"><?php echo $d['alamat']; ?></textarea><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="validationDefault07" class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                      <select name="gender" id="validationDefault08" class="form-control">
                        <option value="Laki-laki" <?php if ($d['gender'] == 'Laki-laki') {
                                                      echo 'selected';
                                                    } ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($d['gender'] == 'Perempuan') {
                                                      echo 'selected';
                                                    } ?>>Perempuan</option>
                      </select><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="validationDefault8" class="col-sm-4 col-form-label">No HP</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="validationDefault8" name="no_hp" value="<?php echo $d['no_hp']; ?>"><br>
                    </div>
                  </div>



                  <div class="form-row">
                    <label for="validationDefault9" class="col-sm-4 col-form-label">Nama Ayah</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="validationDefault9" name="nama_ayah" value="<?php echo $d['nama_ayah']; ?>"><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="validationDefault10" class="col-sm-4 col-form-label">Nama Ibu</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="validationDefault10" name="nama_ibu" value="<?php echo $d['nama_ibu']; ?>"><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="validationDefault11" class="col-sm-4 col-form-label">Agama</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="validationDefault11" name="agama" value="<?php echo $d['agama']; ?>"><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="validationDefault12" class="col-sm-4 col-form-label">No HP Ortu</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="validationDefault12" name="no_hp_ortu" value="<?php echo $d['no_hp_ortu']; ?>"><br>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="validationDefault13" class="col-sm-4 col-form-label">Foto</label>
                    <div class="col-sm-8">
                      <input type="checkbox" class="" name="ubah_foto" value="true"> Ceklis Jika ingin mengubah foto<br>
                      <input type="file" class="form-control" name="foto"><br>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-warning tengah" value="simpan">Ubah Data</button>
                </form>
              <?php } ?>


              </div>
            </div>
            <br><br>
        </div>
      </div>
    </div>
  </section>

  <!-- Akhir Content -->




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>

</html>