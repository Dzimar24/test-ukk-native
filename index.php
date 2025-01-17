<?php

include './connection.php';
if (!isset($_SESSION['user'])) {
   # code...
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Perpustakaan Digital</title>

   <!-- DataTables -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet"
      href="./AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="./AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="?page=index" class="nav-link">Home</a>
            </li>
         </ul>

      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="index3.html" class="brand-link">
            <img src="./AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
               class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="./AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image">
               </div>
               <div class="info">
                  <a href="#" class="d-block"><?php echo $_SESSION['user']['NamaLengkap']; ?> or
                     <?= $_SESSION['user']['Username']; ?></a>
               </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                  <li class="nav-item">
                     <a href="?" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-header">Navigation</li>
                  <?php if ($_SESSION['user']['level'] != 'peminjam'): ?>
                     <li class="nav-item">
                        <a href="?page=kategori" class="nav-link">
                           <i class="nav-icon fas fa-table"></i>
                           <p>
                              Category
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="?page=buku" class="nav-link">
                           <i class="nav-icon fas fa-book"></i>
                           <p>
                              Buku
                           </p>
                        </a>
                     </li>
                  <?php else: ?>
                     <li class="nav-item">
                        <a href="?page=peminjaman" class="nav-link">
                           <i class="nav-icon fas fa-book-open"></i>
                           <p>
                              Peminjaman
                           </p>
                        </a>
                     </li>
                  <?php endif; ?>
                  <li class="nav-item">
                     <a href="?page=ulasan" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                           Ulasan
                        </p>
                     </a>
                  </li>
                  <?php if ($_SESSION['user']['level'] != 'peminjam'): ?>
                     <li class="nav-item">
                     <a href="?page=laporan" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                           Laporan Peminjaman
                        </p>
                     </a>
                  </li>
                     <li class="nav-item">
                     <a href="?page=siswa" class="nav-link">
                        <i class="nav-icon fas fa-people-arrows"></i>
                        <p>
                           CRUD Siswa
                        </p>
                     </a>
                  </li>
                  <?php endif; ?>
                  <li class="nav-header">Settings</li>
                  <li class="nav-item">
                     <a onclick="return confirm('Are you sure?')" href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                           Log Out
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

         <?php

         $page = isset($_GET['page']) ? $_GET['page'] : 'home';
         if (file_exists($page . '.php')) {
            # code...
            include $page . '.php';
         } else {
            # code...
            include '404.php';
         }

         ?>

      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
         <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
         All rights reserved.
         <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
         </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->

   <!-- jQuery -->
   <script src="./AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="./AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="./AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- ChartJS -->
   <script src="./AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
   <!-- Sparkline -->
   <script src="./AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>
   <!-- JQVMap -->
   <script src="./AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
   <!-- jQuery Knob Chart -->
   <script src="./AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js"></script>
   <!-- daterangepicker -->
   <script src="./AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="./AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
   <!-- Summernote -->
   <script src="./AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="./AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- AdminLTE App -->
   <script src="/AdminLTE-3.2.0/dist/js/adminlte.js"></script>
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="/AdminLTE-3.2.0/dist/js/pages/dashboard.js"></script>
   <!-- jQuery -->
   <script src="./AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="./AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="./AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <script src="./AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
   <!-- Page specific script -->
   <script>
      $(function () {
         $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
         });
      });
   </script>
</body>

</html>