<h1 class="text-center mb-3">Kategori Buku</h1>

<!-- Main Content -->
<section class="content">
   <div class="container-fluid">

      <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
            <a href="?page=kategori_tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Plus Category</a>
            <table id="example2" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Name Category</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $i = 1;
                  $query = mysqli_query($connection, "SELECT * FROM kategori");
                  while ($data = mysqli_fetch_array($query)) :
                     ?>
                     <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['NamaKategori'] ?></td>
                        <td>
                           <a href="?page=kategori_edit&&id=<?php echo $data['KategoriID']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <a onclick="return confirm('Are you sure?')" href="?page=kategori_hapus&&id=<?php echo $data['KategoriID']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                  <?php $i++; endwhile; ?>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</section>
<!-- End Main Content -->

<!-- Connection Js -->