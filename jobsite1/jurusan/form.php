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

  <title>Tambah Jurusan</title>
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

  <?php
  include 'connect.php';
  ?>

  <section class="bawahan">
    <div class="content" id="content">
      <div class="container">
        <div class="col-4 marginator kanan">


          <div class="card">
            <div class="card-header bg-primary text-white">
              Tambah Jurusan
            </div>
            <div class="card-body" style="background-color: #ccccff;">



              <form method="post" action="proses.php" enctype="multipart/form-data">
                <div class="form-row">
                  <label class="col-form-label col-sm-4" for="validationDefault01">Nama Jurusan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" for="validationDefault01" name="nm_jurusan" placeholder="" required><br>
                  </div>
                </div>

                <div class="form-row">
                  <label class="col-form-label col-sm-4">Deskripsi</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="deskripsi" placeholder="" required></textarea><br>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary tengah" value="simpan">Tambah Data</button>
                <p>&nbsp;</p><br>

              </form>

            </div>
          </div>

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