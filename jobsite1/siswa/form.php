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

  <title>Input Siswa</title>
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

          <div class="card">
            <div class="card-header bg-primary text-white">
              Tambah Siswa
            </div>
            <div class="card-body" style="background-color: #ccccff;">

              <form method="post" action="proses.php" enctype="multipart/form-data">
                <div class="form-row">
                  <label class="col-sm-4 col-form-label" for="validationDefault01">NISN</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" for="validationDefault01" name="nisn" placeholder="" required><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault02" class="col-sm-4 col-form-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama validationDefault02" name="nama" placeholder="Nama" required><br>
                  </div>
                </div>



                <div class="form-row">
                  <label class="col-sm-4 col-form-label">Kelas</label>
                  <div class="col-sm-8">
                    <select name="id_kelas" id="validationDefault03" class="form-control">
                      <option value="">-- Pilih Kelas --</option>
                      <?php
                      include 'connect.php';

                      $data = mysqli_query($connect, "SELECT * from tbl_kelas ORDER BY id_kelas ASC") or die(mysqli_error($connect));
                      while ($d = mysqli_fetch_array($data)) {
                        ?>
                        <option value="<?= $d["id_kelas"]; ?>"><?= $d["tingkatan"]; ?> <?= $d["nama_kelas"]; ?></option>
                      <?php } ?>
                    </select><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault04" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputEmail3 validationDefault04" name="email" placeholder="masukan email" required><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault05" class="col-sm-4 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="validationDefault05" name="tempat_lahir" placeholder="Bandung" required><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault06" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="validationDefault06" name="tanggal_lahir" placeholder="" required><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault07" class="col-sm-4 col-form-label">Foto</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" id="validationDefault07" name="img" placeholder=" " required><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault08" class="col-sm-4 col-form-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="alamat" placeholder=""></textarea><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault09" class="col-sm-4 col-form-label">Gender</label>
                  <div class="col-sm-8">
                    <select name="gender" id="validationDefault08" class="form-control">
                      <option value="">-- Jenis Kelamin --</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault10" class="col-sm-4 col-form-label">No HP</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="validationDefault09" name="no_hp" placeholder="+62"><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault11" class="col-sm-4 col-form-label">Nama Ayah</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="validationDefault10" name="nama_ayah" placeholder=""><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault12" class="col-sm-4 col-form-label">Nama Ibu</label><br>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="validationDefault11" name="nama_ibu" placeholder=""><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault13" class="col-sm-4 col-form-label">Agama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="validationDefault12" name="agama" placeholder="Islam" required><br>
                  </div>
                </div>

                <div class="form-row">
                  <label for="validationDefault14" class="col-sm-4 col-form-label">No HP Ortu</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="validationDefault13" name="no_hp_ortu" placeholder="+62" required><br>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary tengah" value="simpan">Tambah Data</button>

              </form>

            </div>
          </div>
          <p>&nbsp;</p><br>

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