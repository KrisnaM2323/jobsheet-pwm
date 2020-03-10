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

  <title>Tabel Siswa</title>
</head>

<body class="bg-success">


  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top shadow">

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
          <a class="nav-item nav-link" href="tabel_k.php">Tabel Kelas <span class="sr-only"></span></a>
          <a class="nav-item nav-link" href="#" class=""><span>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
          <a class="nav-item nav-link active" href="#" class="">Tabel Siswa</a>
        </div>
      </div>
    </div>
  </nav>


  <!-- Akhir Navbar -->

  <section>
    <div class="header" id="header">
      <div class="container">
        <h1 class="row justify-content-center text-warning">Tabel Siswa</h1><br>
        &nbsp;&nbsp;&nbsp;
        <a href="siswa/form.php" class="text-primary btn btn-primary">
          <span class="row justify-content-center text-white" align="center">&nbsp;&nbsp;Tambah Siswa&nbsp;&nbsp;</span>
        </a>
        <br>
        <br>


        <form action="" method="post">
          <table border="6" cellpadding="1" align="left" class="bg-secondary table-responsive">
            <tr class="text-dark bg-primary justify-content-center" align=center>
              <th>NO</th>
              <th>NISN</th>
              <th>Nama</th>
              <th>Email</th>
              <th>TTL</th>
              <th>Alamat</th>
              <th>Jenis Kelamin</th>
              <th>No HP</th>
              <th>Agama</th>
              <th>Jurusan</th>
              <th>&nbsp;&nbsp;&nbsp;Kelas&nbsp;&nbsp;&nbsp;</th>
              <th>Foto</th>
              <th>Edit</th>
            </tr>

            <?php
            include 'siswa/connect.php';

            $no = 1;

            $data = mysqli_query($connect, "SELECT * from tb_siswa join tbl_kelas on tb_siswa.id_kelas = tbl_kelas.id_kelas inner join table_jurusan on tbl_kelas.id_jurusan = table_jurusan.id_jurusan") or die(mysqli_error($data));

            while ($d = mysqli_fetch_array($data)) {
              ?>
              <tr class="text-light">
                <td><?= $no++; ?></td>
                <td><?= $d["nisn"]; ?></td>
                <td><?= $d["nama"]; ?></td>
                <td><?= $d["email"]; ?></td>
                <td><?= $d["tempat_lahir"]; ?> <?= $d["tanggal_lahir"]; ?></td>
                <td><?= $d["alamat"]; ?></td>
                <td><?= $d["gender"]; ?></td>
                <td><?= $d["no_hp"]; ?></td>
                <td><?= $d["agama"]; ?></td>
                <td><?= $d["nm_jurusan"]; ?></td>
                <td> <?= $d["tingkatan"]; ?> <?= $d["nama_kelas"]; ?></td>

                <td>
                  <?=
                      "<img src='../XII/images/gambar_siswa/" . $d['foto'] . "' width='100' height='100'>";
                    ?>
                </td>

                <td>
                  <a class="text-white btn btn-success" href="siswa/update.php?id_siswa=<?php echo $d['id_siswa']; ?>">UBAH</a><br>
                  <p></p>
                  <a class="text-white btn btn-danger" href="siswa/delete.php?id_siswa=<?php echo $d['id_siswa']; ?>">HAPUS</a>
                </td>
              </tr>

            <?php } ?>
          </table>

        </form>
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