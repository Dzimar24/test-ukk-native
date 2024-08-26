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

         <?php

         if (isset($_POST['submit'])) {
            # code...
            $id = $_POST['BukuID'];
            $idUser = $_SESSION['user']['UserID'];
            $tglPeminjaman = $_POST['tglPeminjaman'];
            $tglPengembalian = $_POST['tglPengembalian'];
            $status = 'Dipinjam';

            $query = mysqli_query($connection, "INSERT INTO peminjaman (BukuID, UserID, TanggalPeminjaman, TanggalPengembalian, StatusPeminjaman) VALUES ('$id', '$idUser', '$tglPeminjaman', '$tglPengembalian', '$status')");

            if ($query) {
               # code...
               echo '<script>alert("Success"); location.href="index.php?page=peminjaman"</script>';
            } else {
               # code...
               echo '<script>alert("Failed");</script>';
            }
         }

         ?>

         <div class="card-body">
            <div class="form-group">
               <label for="nama">Buku</label>
               <select name="BukuID" id="" class="form-control">
                  <?php
                  $buk = mysqli_query($connection, "SELECT * FROM buku");
                  while ($data = mysqli_fetch_array($buk)): ?>
                     <option value="<?= $data['BukuID'] ?>"><?= $data['Judul'] ?></option>
                  <?php endwhile; ?>
               </select>
            </div>
            <div class="form-group">
               <label for="nama">Tanggal Peminjaman</label>
               <input type="date" name="tglPeminjaman" class="form-control" id="">
            </div>
            <div class="form-group">
               <label for="nama">Tanggal Pengembalian</label>
               <input type="date" name="tglPengembalian" class="form-control" id="">
            </div>
         </div>
         <!-- /.card-body -->

         <div class="card-footer">
            <a href="?page=peminjaman" class="btn btn-danger">Cancel</a>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Data</button>
         </div>
      </form>
   </div>
   <!-- /.card -->
</section>