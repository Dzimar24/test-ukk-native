<!-- der (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
               <div class="inner">
                  <h3><?= mysqli_num_rows(mysqli_query($connection, "SELECT * FROM buku")) ?></h3>

                  <p>Total Buku</p>
               </div>
               <div class="icon">
                  <i class="ion ion-ios-book"></i>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               <div class="inner">
                  <h3><?= mysqli_num_rows(mysqli_query($connection, "SELECT * FROM kategori")) ?></h3>

                  <p>Total Kategori</p>
               </div>
               <div class="icon">
                  <i class="ion ion-ios-albums-outline"></i>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
               <div class="inner">
                  <h3><?= mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ulasanBuku")) ?></h3>

                  <p>Total Ulasan</p>
               </div>
               <div class="icon">
                  <i class="ion ion-ios-chatbubble-outline"></i>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <?php if ($_SESSION['user']['level'] == 'admin' || $_SESSION['user']['level'] == 'petugas'): ?>
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-danger">
                  <div class="inner">
                     <h3><?= mysqli_num_rows(mysqli_query($connection, "SELECT * FROM user")) ?></h3>

                     <p>Total User</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-ios-contact"></i>
                  </div>
               </div>
            </div>
         <?php endif; ?>
         <!-- ./col -->
         <style>
            .centered {
               display: flex;
               justify-content: center;
               align-items: center;
               height: 200px;
            }
         </style>
      </div>
      <div class="centered">
         <div class="card">
            <div class="card-body">
               <table>
                  <tr>
                     <td width="200px">Name</td>
                     <td>:</td>
                     <td><?= $_SESSION['user']['NamaLengkap'] ?></td>
                  </tr>
                  <tr>
                     <td width="200px">Username</td>
                     <td>:</td>
                     <td><?= $_SESSION['user']['Username'] ?></td>
                  </tr>
                  <tr>
                     <td width="200px">Level</td>
                     <td>:</td>
                     <td><?= $_SESSION['user']['level'] ?></td>
                  </tr>
                  <tr>
                     <td width="200px">Date Login</td>
                     <td>:</td>
                     <td><?= date('Y-m-d') ?></td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->

   </div><!-- /.container-fluid -->
</section>
<!-- /.content -->