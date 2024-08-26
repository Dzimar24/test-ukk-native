<!-- Main content -->
<section class="content mt-3">
   <div class="container-fluid"></div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Buku</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post">

         <?php

         if (isset($_POST['submit'])) {
            # code...
            $kategori = $_POST['idKategory'];
            $judul = $_POST['title'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $deskripsi = $_POST['deskripsi'];
            $tahun = $_POST['tahunPenerbitan'];

            $query = mysqli_query($connection, "INSERT INTO buku (idKategory, Judul, Penulis, Penerbit, Deskripsi, TahunTerbit) VALUES ('$kategori', '$judul', '$penulis', '$penerbit', '$deskripsi', '$tahun')");

            if ($query) {
               # code...
               echo '<script>alert("Success"); location.href="index.php?page=buku"</script>';
            } else {
               # code...
               echo '<script>alert("Failed");</script>';
            }
         }

         ?>

         <div class="card-body">
            <div class="form-group">
               <label for="nama">Kategori</label>
               <select name="idKategory" id="" class="form-control">
                  <?php
                  $cat = mysqli_query($connection, "SELECT * FROM kategori");
                  while ($data = mysqli_fetch_array($cat)): ?>
                     <option value="<?= $data['KategoriID'] ?>"><?= $data['NamaKategori'] ?></option>
                  <?php endwhile; ?>
               </select>
            </div>
            <div class="form-group">
               <label for="judul">Judul</label>
               <input type="text" name="title" class="form-control" id="judul" placeholder="Enter Judul">
            </div>
            <div class="form-group">
               <label for="penulis">Penulis</label>
               <input type="text" name="penulis" class="form-control" id="penulis" placeholder="Enter Penulis">
            </div>
            <div class="form-group">
               <label for="penerbit">Penerbit</label>
               <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Enter Penerbit">
            </div>
            <div class="form-group">
               <label for="tahun">Tahun Penerbitan</label>
               <input type="number" name="tahunPenerbitan" class="form-control" id="tahun"
                  placeholder="Enter Tahun Penerbitan">
            </div>
            <div class="form-group">
               <label for="nama">Deskripsi</label>
               <textarea name="deskripsi" rows="3" class="form-control" id=""></textarea>
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