<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- My CSS -->

  <link rel="stylesheet" type="text/css" href="_assets/css/custom.css">
  <link rel="stylesheet" type="text/css" href="_assets/css/sb-admin-2.css">

  <title>Menu LOGIN</title>
</head>

<body style="background-color: #00ff88;">


<h1 class="text-center text-gray-900"><br><b>Silahkan untuk LOGIN</b></h1>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

          <?php
            if(isset($_GET['pesan'])){
              // echo "<div col-lg-3>&nbsp;&nbsp;</div>";
              if($_GET['pesan']=="gagal"){
                echo "<div class='alert alert-warning col-lg-6 tengah' role='alert'><b>NISN tidak terdaftar !</b></div>";
              }else if($_GET['pesan']=="bukan_admin"){
                echo "<div class='alert alert-danger tengah col-lg-6' role='alert'><span class='tengah'><b>Anda bukan Admin !</b></span></div>";  
              }else if($_GET['pesan']=="bukan_guru"){
                echo "<div class='alert alert-danger tengah col-lg-6' role='alert'><span class='tengah'><b>Anda bukan Guru !</b></span></div>";  
              }else if($_GET['pesan']=="bukan_siswa"){
                echo "<div class='alert alert-danger tengah col-lg-6' role='alert'><span class='tengah'><b>Anda bukan Siswa !</b></span></div>";  
              
              }else if($_GET['pesan']=="logout"){
                echo "<div class='alert alert-primary tengah col-lg-5' role='alert'><span class='tengah'><b>Berhasil Log out</b></span></div>";  
              }else{

              }
            }
          ?>

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div style="background-color: #ccffcc;" class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4 login text-black-50">LOGIN</h1>
                                </div>

                                

                                <form method="post" action="cek_login.php" enctype="multipart/form-data">
                                  <div class="form-row">
                                    <label class="col-form-label col-sm-4 text-gray-900" for="validationDefault01">NISN</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" for="validationDefault01" name="nisn" placeholder="" required><br>
                                    </div>
                                  </div>

                                  <!-- <div class="form-row">
                                    <label class="col-form-label col-sm-4 text-gray-900">Password</label>
                                    <div class="col-sm-8">
                                      <input type="password" class="form-control" for="validationDefault01" name="password" placeholder="Password .." required><br>
                                    </div>
                                  </div> -->

                                  <div class="form-row">
                                    <div class="col-sm-5"></div>
                                    <button type="submit" name="login_siswa" value="login_siswa" class="btn btn-success">LOGIN</button>
                                  </div>

                                  <p>Login sebagai <a href="index.php">Admin</a> atau <a href="login_guru.php">Guru</a></p><br>

                                </form>

                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
  

  <!-- Script -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!-- Akhir Script -->


</body>

</html>