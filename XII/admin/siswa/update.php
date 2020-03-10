<?php 
session_start();
if($_SESSION['id_user']==""){
  header("location: ../../index.php?pesan=bukan_admin");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta Tambahan -->
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- link Tambahan -->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
  <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
  <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#563d7c">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="../../_assets/css/sb-admin-2.css" rel="stylesheet">

  <title>Edit Siswa</title>
</head>

<body class="bg-success">


  <!-- Navbar -->

  <div class="container pt-5">
      <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-primary flex-md-nowrap p-0 shadow py-1">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../menu.php">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="../tabel_jurusan.php">Tabel Jurusan</a>
                </li>
              </ul>
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="../tabel_k.php">Tabel Kelas</a>
                </li>
              </ul>
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="../table.php">Tabel Siswa</a>
                </li>
              </ul>
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="../table_g.php">Tabel Guru</a>
                </li>
              </ul>
            </div>
          </div>
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="../../logout.php">Log out</a>
          </li>
        </ul>
      </nav>
    </div>


  <!-- Akhir Navbar -->


  <!-- Content -->

  <section class="bawahan">
    <div class="content" id="content">
      <div class="container row">
        <div class="col-5 marginator kanan"></div>
        <div class="col-4 marginator kanan">


          <?php
          include 'connect.php';

          $id_siswa = $_GET['id_siswa'];
          $data = mysqli_query($connect, "SELECT * from tb_siswa where id_siswa='$id_siswa' ") or die (mysqli_error($connect));
          while ($d = mysqli_fetch_array($data)) {

            ?>

            <div class="card mt-5 mb-5">
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

                  <button type="submit" class="btn btn-primary tengah" value="simpan">Ubah Data</button>
                </form>
              <?php } ?>


              </div>
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Akhir Content -->




  <!-- Script -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="dashboard.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Akhir Script -->

</body>

</html>