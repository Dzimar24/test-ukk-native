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

         if (isset($_POST['submit'])) {
            # code...
            $id = $_POST['BukuID'];
            $idUser = $_SESSION['user']['UserID'];
            $ulasan = $_POST['ulasan'];
            $rating = $_POST['rating'];

            $query = mysqli_query($connection, "INSERT INTO ulasanbuku (BukuID, UserID, Ulasan, Rating) VALUES ('$id', '$idUser', '$ulasan', '$rating')");

            if ($query) {
               # code...
               echo '<script>alert("Success"); location.href="index.php?page=ulasan"</script>';
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
               <label for="nama">Ulasan</label>
               <textarea name="ulasan" rows="3" class="form-control" id=""></textarea>
            </div>
            <div class="form-group">
               <label for="nama">Rating</label>
               <select name="rating" id="">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
               </select>
            </div>
         </div>
         <!-- /.card-body -->

         <div class="card-footer">
            <a href="?page=buku" class="btn btn-danger">Cancel</a>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Data</button>
         </div>
      </form>
   </div>
   <!-- /.card -->
</section>