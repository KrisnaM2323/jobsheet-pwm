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

  <title>Tabel Kelas</title>
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
          <a class="nav-item nav-link" href="tabel_jurusan.php" class="">Tabel Jurusan</a>
          <a class="nav-item nav-link" href="#" class=""><span>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
          <a class="nav-item nav-link active" href="#">Tabel Kelas <span class="sr-only"></span></a>
          <a class="nav-item nav-link" href="#" class=""><span>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
          <a class="nav-item nav-link" href="table.php" class="">Tabel Siswa</a>
        </div>
      </div>
    </div>
  </nav>


  <!-- Akhir Navbar -->

  <section>
    <div class="header" id="header">
      <div class="container">
        <h1 class="row justify-content-center text-warning">Tabel Kelas</h1><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="kelas/form.php" class="btn btn-primary">
          <span class="row justify-content-center text-white" align="center">&nbsp;&nbsp;Tambah Kelas&nbsp;&nbsp;</h5>
        </a><br><br>
        <div class="row">
          <div class="col col-sm-2">

          </div>

          <div class="col col-sm-6">
            <form action="" method="POST">
              <table border="5" cellpadding="2" class="bg-secondary text-align-center table-responsive row">
                <tr class="text-dark bg-primary " align="center">
                  <th>NO</th>
                  <th>Nama Kelas</th>
                  <th>Tingkatan</th>
                  <th>Keterangan</th>
                  <th>Nama Jurusan</th>
                  <th>Edit</th>
                </tr>

                <?php
                include 'siswa/connect.php';
                $no = 1;
                $data = mysqli_query($connect, "SELECT tbl_kelas.id_kelas, tbl_kelas.nama_kelas, tbl_kelas.tingkatan, tbl_kelas.keterangan, table_jurusan.nm_jurusan from tbl_kelas inner join table_jurusan on tbl_kelas.id_jurusan = table_jurusan.id_jurusan")or die(mysqli_error($connect));
                while ($d = mysqli_fetch_array($data)) {
                  ?>

                  <tr class="text-light">
                    <td><?= $no++; ?></td>
                    <td><?= $d["nama_kelas"]; ?></td>
                    <td><?= $d["tingkatan"]; ?></td>
                    <td><?= $d["keterangan"]; ?></td>
                    <td><?= $d["nm_jurusan"]; ?></td>
                    <td align="center">
                      <a class="text-white btn btn-success" href="kelas/update.php?id_kelas=<?= $d['id_kelas']; ?>">&nbsp;UBAH </a><br>
                      <p></p>
                      <a class="text-white btn btn-danger" href="kelas/delete.php?id_kelas=<?= $d['id_kelas']; ?>">HAPUS</a>
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

  <!-- Akhir Script -->


</body>

</html>