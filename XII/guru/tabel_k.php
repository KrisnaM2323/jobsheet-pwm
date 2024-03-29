<?php 
session_start();
if($_SESSION['nik']==""){
  header("location: ../login_guru.php?pesan=bukan_guru");
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
  <link href="../_assets/css/sb-admin-2.css" rel="stylesheet">
  <link href="../_assets/css/custom.css" rel="stylesheet">
  <link href="../_assets/fonts/fontawesome-5.12.1/css/all.min.css" rel="stylesheet">


  <title>Tabel Kelas</title>
</head>

<body class="bg-success">


  <!-- Navbar -->


  <div class="container">
      <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-primary flex-md-nowrap p-0 shadow py-1">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="menu.php">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="tabel_jurusan.php">Tabel Jurusan</a>
                </li>
              </ul>
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link text-light" href="#">Tabel Kelas</a>
                </li>
              </ul>
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="table.php">Tabel Siswa</a>
                </li>
              </ul>
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="table_g.php">Tabel Guru</a>
                </li>
              </ul>
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="tabel_pelajaran.php">Tabel Pelajaran</a>
                </li>
              </ul>
            </div>
          </div>

        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="../logout.php">Log out</a>
          </li>
        </ul>
        
      </nav>
    </div>


  <!-- Akhir Navbar -->

  <section>
    <div class="header" id="header">
      <div class="container">
        <h1 class="row justify-content-center text-warning pt-5">Tabel Kelas</h1><br>

        <?php
        if(isset($_GET['pesan'])){
          if($_GET['pesan']=="data_dihapus"){
            echo "<div class='alert alert-danger tengah col-lg-4' role='alert'>
                    <span class='tengah'><b>Data berhasil dihapus</b></span>
                    </div>";  
          }else if($_GET['pesan']=="data_diubah"){
            echo "<div class='alert alert-success tengah col-lg-4' role='alert'>
                    <span class='tengah'><b>Data berhasil diubah</b></span>
                    </div>";  
          }else if($_GET['pesan']=="data_ada"){
            echo "<div class='alert alert-warning tengah col-lg-4' role='alert'>
            <span class='tengah'><b>Data Sudah Ada</b></span>
                  </div>";  
                }else if($_GET['pesan']=="data_disimpan"){
            echo "<div class='alert alert-primary tengah col-lg-4' role='alert'>
                    <span class='tengah'><b>Data Di Simpan</b></span>
                  </div>";  
                }else if($_GET['pesan']=="import_excel"){
            echo "<div class='alert alert-info tengah col-lg-4' role='alert'>
                    <span class='tengah'><b>File Excel Di Import</b></span>
                    </div>";  
          }else{
            
          }
        }
        ?>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <a href="kelas/cetak.php" target="_blank" class="btn btn-light">
          <span class="row justify-content-center text-danger" align="center"><i class="fas fa-file-pdf"> Cetak &nbsp;</i></h5>
        </a>
        <a href="kelas/import.php" class="text-info btn btn-light">
          <span class="row justify-content-center text-warning" align="center"><i class="fas fa-file-import"> Import &nbsp;</i></span>
        </a>
        <a href="kelas/function_export.php" class="text-info btn btn-light">
          <span class="row justify-content-center text-success" align="center"><i class="fas fa-file-excel"> Export &nbsp;</i></span>
        </a>
        <div class="row pt-4">
          <div class="col col-sm-2">

          </div>

          <div class="col col-auto">
            <form class="pb-5" action="" method="POST">
              <table border="5" cellpadding="2" class="bg-dark text-align-center table-responsive table-hover">
                <tr class="text-dark bg-info " align="center">
                  <th>NO</th>
                  <th>Nama Kelas</th>
                  <th>Tingkatan</th>
                  <th>Keterangan</th>
                  <th>Nama Jurusan</th>
                  <th>Cetak</th>
                </tr>

                <?php
                include 'siswa/connect.php';
                $no = 1;
                $data = mysqli_query($connect, "SELECT tbl_kelas.id_kelas, tbl_kelas.id_jurusan, tbl_kelas.nama_kelas, tbl_kelas.tingkatan, tbl_kelas.keterangan, tb_jurusan.nm_jurusan from tbl_kelas inner join tb_jurusan on tbl_kelas.id_jurusan = tb_jurusan.id_jurusan")or die(mysqli_error($connect));
                while ($d = mysqli_fetch_array($data)) {
                  ?>

                  <tr class="text-light">
                    <td><?= $no++; ?></td>
                    <td><?= $d["nama_kelas"]; ?></td>
                    <td><?= $d["tingkatan"]; ?></td>
                    <td><?= $d["keterangan"]; ?></td>
                    <td><?= $d["nm_jurusan"]; ?></td>
                    <td align="center"><a class="text-white badge badge-warning" href="kelas/pdf.php?id_kelas=<?= $d['id_kelas']; ?>" target="_blank"><i class="fas fa-print"></i></a>
                    </td>
                  </tr>

                <?php } ?>
              </table>

            </form>
          </div>
        </div>


        <!-- Akhir Table -->

      </div>
    </div>
  </section>

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