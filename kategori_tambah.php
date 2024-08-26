<!-- Main content -->
<section class="content mt-3">
   <div class="container-fluid"></div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Plus Category</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post">

         <?php 
         
            if (isset($_POST['submit'])) {
               # code...
               $kategori = $_POST['namaKategori'];

               $query = mysqli_query($connection, "INSERT INTO kategori(NamaKategori) VALUES ('$kategori')");
            
               if ($query) {
                  # code...
                  echo '<script>alert("Success"); location.href="index.php?page=kategori"</script>';
               } else {
                  # code...
                  echo '<script>alert("Failed");</script>';
               }
            } 

         ?>

         <div class="card-body">
            <div class="form-group">
               <label for="nama">Nama Kategori Buku</label>
               <input type="text" name="namaKategori" class="form-control" id="nama" placeholder="Enter kategori">
            </div>
         </div>
         <!-- /.card-body -->

         <div class="card-footer">
            <a href="?page=kategori" class="btn btn-danger">Cancel</a>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Data</button>
         </div>
      </form>
   </div>
   <!-- /.card -->
</section>