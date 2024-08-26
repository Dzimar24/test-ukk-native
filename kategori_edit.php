<!-- Main content -->
<section class="content mt-3">
   <div class="container-fluid"></div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Category</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post">

         <?php 
         
            $id = $_GET['id'];
            if (isset($_POST['submit'])) {
               # code...
               $kategori = $_POST['namaKategori'];

               $query = mysqli_query($connection, "UPDATE kategori SET NamaKategori = '$kategori' WHERE KategoriID = '$id'");
            
               if ($query) {
                  # code...
                  echo '<script>alert("Success"); location.href="index.php?page=kategori"</script>';
               } else {
                  # code...
                  echo '<script>alert("Failed");</script>';
               }
            }

            $query = mysqli_query($connection, "SELECT * FROM kategori WHERE KategoriID = '$id'");
            $data = mysqli_fetch_array($query);

         ?>

         <div class="card-body">
            <div class="form-group">
               <label for="nama">Nama Kategori</label>
               <input type="text" name="namaKategori" value="<?= $data['NamaKategori'] ?>" class="form-control" id="nama" placeholder="Enter kategori">
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