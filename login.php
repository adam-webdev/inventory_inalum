<?php

require_once('./config/database.php');
session_start();

if (isset($_SESSION['name'])) {
  header('location:index.php');
}
// if (isset($_SESSION['logout']) == true) {
//   echo "<div id='notice' onclick='hapusNotice()' style='padding:4px 10px; cursor:pointer; color:#fff;text-align:center; background:red; width:100%;'>Anda telah keluar dari program</div>";
// }
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = trim($_POST['password']);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<div id='notice' onclick='hapusNotice()' style='padding:4px 10px; cursor:pointer; color:#fff;text-align:center; background:red; width:100%;'>Invalid Email</div>";
  }

  $sql = "SELECT * FROM users WHERE email='$email'";
  // $sql = "SELECT `password` FROM `users` WHERE `email` = '" . $_POST['email'] . "'";
  $query = mysqli_query($conn, $sql);
  $check = mysqli_num_rows($query);
  if ($check > 0) {
    $row_user = mysqli_fetch_assoc($query);
    if (password_verify($password, $row_user['password'])) {
      $_SESSION['name'] = $row_user['name'];
      $_SESSION['id'] = $row_user['id'];
      header('location:index.php?page=dashboard');
    } else {
      echo "<div id='notice' onclick='hapusNotice()' style='padding:4px 10px; cursor:pointer; color:#fff;text-align:center; background:red; width:100%;'>Email atau Password Salah</div>";
    }
  } else {
    echo "<div id='notice' onclick='hapusNotice()' style='padding:4px 10px; cursor:pointer; color:#fff;text-align:center; background:red; width:100%;'>User tidak ditemukan</div>";
    header('location:login.php');
  }
}


//   $row = '';
//   while ($rows = $query->fetch_assoc()) {
//     $row = $rows['password'];
//   }
//   $password_ok = password_verify($password, $row);
//   $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
//   $user = mysqli_query($conn, $sql);
//   var_dump($user);
//   $check = mysqli_num_rows($user);
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Inventory - Login</title>

  <!-- Custom fonts for this template-->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="public/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <style>
  body {
    background: url('../public/assets/img/bg.png') no-repeat !important;
    background-color: black;
    background-size: cover;
  }
  </style> -->
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-6 " style="margin-top: 150px;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none  d-flex justify-content-center align-items-center">
                <img src="public/assets/img/inalum.png" alt="inalum" width="350px">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                    <p>silahkan login!</p>
                  </div>
                  <form class="user" method="post" action="">
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
                    <button class="btn btn-primary  btn-block" type="submit" name="submit">
                      Login
                    </button>

                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div> -->
                  <div class="text-center">
                    Belum Punya akun ? silahkan <a class="small" href="register.php">Daftar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="public/assets/vendor/jquery/jquery.min.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="public/assets/js/sb-admin-2.min.js"></script>
  <script>
    function hapusNotice() {
      document.getElementById("notice").style.display = "none";
    }
  </script>
</body>

</html>