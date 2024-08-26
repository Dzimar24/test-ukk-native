<?php include './connection.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>AdminLTE 3 | Registration Page</title>

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

<body class="hold-transition register-page">
   <div class="register-box">
      <div class="register-logo">
         <a href="./AdminLTE-3.2.0/index2.html"><b>Register </b>Page</a>
      </div>

      <div class="card">
         <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <?php

            if (isset($_POST['register'])) {
               # code...
               $nama = $_POST['nama'];
               $username = $_POST['username'];
               $email = $_POST['email'];
               $alamat = $_POST['alamat'];
               $level = 'peminjam';
               $password = $_POST['password'];

               $dataInsert = mysqli_query($connection, "INSERT INTO user (username, password, NamaLengkap, email, alamat, level) VALUES ('$username', '$password', '$nama', '$email', '$alamat', '$level')");
            
               if ($dataInsert) {
                  # code...
                  echo '<script>alert("Register Success"); location.href="login.php"</script>';
               } else {
                  # code...
                  echo '<script>alert("Register Failed"); location.href="register.php"</script>';
               }
            }

            ?>

            <form method="post">
               <div class="input-group mb-3">
                  <input type="text" name="nama" class="form-control" placeholder="Full name" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="text" name="username" class="form-control" placeholder="Full Username" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-map-marker"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-end">
                  <!-- /.col -->
                  <div class="col-4">
                     <button type="submit" name="register" value="register"
                        class="btn btn-primary btn-block">Register</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>

            <div class="social-auth-links text-center">
               <p>- OR -</p>
            </div>

            <a href="login.php" class="text-center">I already have a membership</a>
         </div>
         <!-- /.form-box -->
      </div><!-- /.card -->
   </div>
   <!-- /.register-box -->

   <!-- jQuery -->
   <script src="./AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="./AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- AdminLTE App -->
   <script src="./AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>