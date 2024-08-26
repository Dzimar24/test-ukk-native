<!-- Main content -->
<section class="content mt-3">
   <div class="container-fluid"></div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Ulasan Buku</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post">

         <?php

         $id = $_SESSION['user']['UserID'];
         if (isset($_POST['submit'])) {
            $idBuku = $_POST['BukuID'];
            $idUser = $_SESSION['user']['UserID'];
            $ulasan = $_POST['ulasan'];
            $rating = $_POST['rating'];

            $query = mysqli_query($connection, "UPDATE ulasanbuku SET BukuID = '$idBuku', UserID = '$idUser', Ulasan = '$ulasan', Rating = '$rating' WHERE UserID = '$id'");

            if ($query) {
               echo '<script>alert("Success"); location.href="index.php?page=ulasan"</script>';
            } else {
               echo '<script>alert("Failed");</script>';
            }
         }

         $query = mysqli_query($connection, "SELECT * FROM ulasanbuku WHERE UlasanID = '$id'");
         $data = mysqli_fetch_array($query);
         ?>

         <div class="card-body">
            <div class="form-group">
               <label for="BukuID">Buku</label>
               <select name="BukuID" id="BukuID" class="form-control">
                  <?php
                  $buk = mysqli_query($connection, "SELECT * FROM buku");
                  while ($bukuData = mysqli_fetch_array($buk)): ?>
                     <option value="<?= $bukuData['BukuID'] ?>"><?= $bukuData['Judul'] ?></option>
                  <?php endwhile; ?>
               </select>
            </div>
            <div class="form-group">
               <label for="ulasan">Ulasan</label>
               <textarea name="ulasan" rows="3" class="form-control" id="ulasan"><?= $data['Ulasan'] ?></textarea>
            </div>
            <div class="form-group">
               <label for="rating">Rating</label>
               <select name="rating" id="rating" class="form-control">
                  <?php for ($i = 1; $i <= 10; $i++): ?>
                     <option value="<?= $i ?>"><?= $i ?></option>
                  <?php endfor; ?>
               </select>
            </div>
         </div>
         <!-- /.card-body -->

         <div class="card-footer">
            <a href="?page=ulasan" class="btn btn-danger">Cancel</a>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Data</button>
         </div>
      </form>
   </div>
   <!-- /.card -->
</section>
