<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get the ID from the GET request
$id = $_GET['id'];

// Retrieve the data to be edited
$query = mysqli_query($connection, "SELECT * FROM peminjaman WHERE PeminjamanID = '$id'");
$data = mysqli_fetch_array($query);

// Check if the form is submitted
if (isset($_POST['submit'])) {
   // Retrieve values from POST request
   $idBuku = $_POST['BukuID'];
   $idUser = $_SESSION['user']['UserID'];
   $tglPeminjaman = $data['TanggalPeminjaman'];
   $tglPengembalian = $_POST['tglPengembalian'];
   $status = 'Dikembalikan';

   // Validate the date inputs
   if (!empty($tglPeminjaman) && !empty($tglPengembalian)) {
      // Update the database with the new values
      $query = mysqli_query($connection, "UPDATE peminjaman SET BukuID = '$idBuku', UserID = '$idUser', TanggalPeminjaman = '$tglPeminjaman', TanggalPengembalian = '$tglPengembalian', StatusPeminjaman = '$status' WHERE PeminjamanID = '$id'");

      if ($query) {
         echo '<script>alert("Success"); location.href="index.php?page=peminjaman"</script>';
      } else {
         echo '<script>alert("Failed");</script>';
      }
   } else {
      echo '<script>alert("Tanggal Peminjaman dan Tanggal Pengembalian tidak boleh kosong");</script>';
   }
}
?>
<!-- Main content -->
<!-- Main content -->
<section class="content mt-3">
   <div class="container-fluid"></div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Peminjaman Buku</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post">
         <div class="card-body">
            <div class="form-group">
               <label for="nama">Buku</label>
               <?php
               $buk = mysqli_query($connection, "SELECT * FROM buku WHERE BukuID = '" . $data['BukuID'] . "'");
               $buku_data = mysqli_fetch_array($buk);
               ?>
               <input type="hidden" name="BukuID" value="<?= $buku_data['BukuID'] ?>">
               <input class="form-control" type="text" name="BukuJudul" value="<?= $buku_data['Judul'] ?>" disabled>
            </div>
            <div class="form-group">
               <label for="tglPeminjaman">Tanggal Peminjaman</label>
               <input type="date" name="tglPeminjaman" value="<?= $data['TanggalPeminjaman'] ?>" class="form-control"
                  id="" disabled>
            </div>
            <div class="form-group">
               <label for="tglPengembalian">Tanggal Pengembalian</label>
               <input type="date" name="tglPengembalian" value="<?= $data['TanggalPengembalian'] ?>"
                  class="form-control" id="">
            </div>
         </div>
         <!-- /.card-body -->

         <div class="card-footer">
            <a href="?page=peminjaman" class="btn btn-danger">Cancel</a>
            <button type="submit" name="submit" value="submit" class="btn btn-primary" style="margin-left: 20px;">Save Data</button>
         </div>
      </form>
   </div>
   <!-- /.card -->
</section>