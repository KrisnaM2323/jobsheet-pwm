<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- My CSS -->

  <link rel="stylesheet" href="custom.css">

  <title>Tabel Jurusan</title>
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
          <a class="nav-item nav-link active" href="#" class="">Tabel Jurusan</a>
          <a class="nav-item nav-link" href="#" class=""><span>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
          <a class="nav-item nav-link" href="tabel_k.php">Tabel Kelas <span class="sr-only"></span></a>
          <a class="nav-item nav-link" href="#" class=""><span>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
          <a class="nav-item nav-link" href="table.php" class="">Tabel Siswa</a>
        </div>
      </div>
    </div>
  </nav>



  <section>
    <div class="header" id="header">
      <div class="container">
        <h1 class="row justify-content-center text-warning">Tabel Jurusan</h1><br>

        <div class="col">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="jurusan/form.php" class="btn btn-primary">
            <span class="text-white row justify-content-center" align="center">&nbsp;&nbsp;Tambah Jurusan&nbsp;&nbsp;</span>
          </a><br><br>
        </div>

        <div class="row">
          <p>&nbsp;</p>
          <div class="col col-sm-3">
            <p></p>
          </div>

          <div class="col col-sm-4">
            <form action="" method="POST">
              <table border="5" cellpadding="2" class="bg-secondary text-align-center table-responsive">
                <tr class="text-dark bg-primary">
                  <th>NO</th>
                  <th>Nama Jurusan</th>
                  <th>Deskripsi</th>
                  <th class="text-center">Edit</th>
                </tr>

                <?php
                include 'jurusan/connect.php';
                $no = 1;
                $data = mysqli_query($connect, "SELECT * from table_jurusan")or die(mysqli_error($connect));
                while ($d = mysqli_fetch_array($data)) {
                  ?>

                  <tr class="text-light">
                    <td><?= $no++; ?></td>
                    <td><?= $d["nm_jurusan"]; ?></td>
                    <td><?= $d["deskripsi"]; ?></td>
                    <!-- <td>
                      <?=
                          "<img src='../images/gambar_jurusan/" . $d['foto'] . "' width='100' height='100'>";
                        ?>
                    </td> -->
                    <td align="center">
                      <a class="text-white btn btn-success" href="jurusan/update.php?id_jurusan=<?= $d['id_jurusan']; ?>">&nbsp;UBAH&nbsp;</a>
                      <p></p>
                      <a class="text-white btn btn-danger" href="jurusan/delete.php?id_jurusan=<?= $d['id_jurusan']; ?>">HAPUS</a>
                    </td>
                  </tr>

                <?php } ?>
              </table>

            </form>
          </div>
        </div>

        <!-- Akhir Table -->
        <p>&nbsp;<br><br><br></p>

      </div>
    </div>
  </section>









  <!-- Script -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>

</html>