<h1 class="text-center mb-3">Buku</h1>

<!-- Main Content -->
<section class="content">
   <div class="container-fluid">

      <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
            <a href="?page=buku_tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Plus Buku</a>
            <table id="example2" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Name Category</th>
                     <th>Judul</th>
                     <th>Penulis</th>
                     <th>Penerbit</th>
                     <th>Deskripsi</th>
                     <th>Tahun Terbit</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $i = 1;
                  $query = mysqli_query($connection, "SELECT * FROM buku LEFT JOIN kategori ON buku.idKategory = kategori.KategoriID");
                  while ($data = mysqli_fetch_array($query)) :
                     ?>
                     <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['NamaKategori'] ?></td>
                        <td><?= $data['Judul'] ?></td>
                        <td><?= $data['Penulis'] ?></td>
                        <td><?= $data['Penerbit'] ?></td>
                        <td><?= $data['deskripsi'] ?></td>
                        <td><?= $data['TahunTerbit'] ?></td>
                        <td>
                           <a href="?page=buku_edit&&id=<?php echo $data['BukuID']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <a onclick="return confirm('Are you sure?')" href="?page=buku_hapus&&id=<?php echo $data['BukuID']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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