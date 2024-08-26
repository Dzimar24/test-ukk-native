<!-- Main content -->
<section class="content mt-3">
   <div class="container-fluid"></div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Insert Siswa</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" enctype="multipart/form-data">

         <?php

         if (isset($_POST['submit'])) {
            # code...
            move_uploaded_file($_FILES['image']['tmp_name'], './uploads/' . basename($_FILES['image']['name']));

            $nama = $_POST['nama'];
            $nis = $_POST['nis'];
            $tglLahir = $_POST['yglLahir'];
            $alamat = $_POST['alamat'];
            $image = $_FILES['image']['name'];

            $query = mysqli_query($connection, "INSERT INTO siswa (nama, nis, image, alamat, tanggalLahir) VALUES ('$nama', '$nis', '$image', '$alamat', '$tglLahir')");

            if (!$query) {
               # code...
               echo "ERRor" . mysqli_error($connection);
            }


            if ($query) {
               # code...
               echo '<script>alert("Success"); location.href="index.php?page=siswa"</script>';
            } else {
               # code...
               echo '<script>alert("Failed");</script>';
            }
         }

         ?>

         <div class="card-body">
            <div class="form-group">
               <label for="nama">Nama</label>
               <input type="text" class="form-control" name="nama" placeholder="Enter Your Name" id="">
            </div>
            <div class="form-group">
               <label for="nama">NIS</label>
               <input type="text" class="form-control" inputmode="numeric" name="nis" placeholder="Enter Your NIS">
            </div>
            <div class="form-group">
               <label for="nama">Tanggal Lahir</label>
               <input type="date" name="yglLahir" class="form-control" id="">
            </div>
            <div class="form-group">
               <label for="nama">Alamat</label>
               <textarea name="alamat" class="form-control" id=""></textarea>
            </div>
            <div class="form-group">
               <label for="nama">Image Siswa</label>
               <input type="file" class="form-control" name="image" id="">
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