<?php 
include './connection.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login Page</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href="./AdminLTE-3.2.0/index2.html"><b>Login</b> Page</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
         <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php 
               if (isset($_POST['login'])) {
                  # code...
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  $data = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

                  $check = mysqli_num_rows($data);
                  if ($check > 0) {
                     # code...
                     $_SESSION['user'] = mysqli_fetch_array($data);
                     echo '<script>alert("Selamat Datang, Login Success"); location.href="index.php"</script>';
                  } else {
                     # code...
                     echo '<script>alert("Login Failed");</script>';
                  }
               }
            ?>

            <form method="post">
               <div class="input-group mb-3">
                  <input name="username" type="text" class="form-control" placeholder="username">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input name="password" type="password" class="form-control" placeholder="Password">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-end mt-3">
                  <!-- /.col -->
                  <div class="col-6">
                     <button type="submit" name="login" class="btn btn-primary btn-block" value="login">Login</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>
            <p class="text-center m-3">- OR -</p>
            <p class="mb-0 mt-3">
               <a href="register.php" class="text-center">Register a new membership</a>
            </p>
         </div>
         <!-- /.login-card-body -->
      </div>
   </div>
   <!-- /.login-box -->

   <!-- jQuery -->
   <script src="./AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="./AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- AdminLTE App -->
   <script src="./AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>