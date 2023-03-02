<?php
require_once('./config/database.php');
session_start();
if (isset($_SESSION['user'])) {
  header('location:index.php');
}
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  // $email_exist = `SELECT email FROM users WHERE email=$email`;
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "<div id='notice' onclick='hapusNotice()' style='padding:4px 10px; cursor:pointer; color:#fff;text-align:center; background:red; width:100%;'>Invalid Email</div>";
  }
  $select = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '" . $_POST['email'] . "'") or exit(mysqli_error($conn));
  if (mysqli_num_rows($select)) {
    echo "<div id='notice' onclick='hapusNotice()' style='padding:4px 10px; cursor:pointer; color:#fff;text-align:center; background:red; width:100%;'>Email sudah digunakan !!</div>";
  } else {
    $datenow = date('Y-m-d');
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password, created_at) VALUES ('$name','$email','$password','$datenow')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      header('Location: login.php');
    } else {
      echo "<div id='notice' onclick='hapusNotice()' style='padding:4px 10px; cursor:pointer; color:#fff;text-align:center; background:red; width:100%;'>Registrasi Gagal  !!</div>";
    }
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Inventory - Register</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="public/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    body {

      background: linear-gradient(rgba(0, 0, 0, 0.7),
          rgba(0, 0, 0, 0.7)), url('./public/assets/img/bg.jpeg') no-repeat !important;
      background-size: cover;
      background-position: center;
      background-blend-mode: luminosity;

    }
  </style>
</head>

<body>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-6 " style="margin-top: 150px;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Daftar</h1>
                  </div>
                  <form class="user" action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control " name="name" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Name...">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control " name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control " name="password" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div> -->
                    <button href="#" class="btn btn-primary  btn-block" name="submit" type="submit">
                      Daftar
                    </button>

                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div> -->
                  <div class="text-center">
                    Sudah punya akun ? silahkan <a class="small" href="login.php">Login</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 d-none  d-flex justify-content-center align-items-center">
                <img src="public/assets/img/inalum.png" alt="inalum" width="350px">
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <script src="public/assets/vendor/jquery/jquery.min.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <!-- Core plugin JavaScript-->
  <script src="public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <!-- Custom scripts for all pages-->
  <script src="public/assets/js/sb-admin-2.min.js"></script>
  <script>
    function hapusNotice() {
      document.getElementById("notice").style.display = "none";
    }
  </script>
</body>

</html>