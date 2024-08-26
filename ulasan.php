<h1 class="text-center mb-3">Ulasan Buku</h1>

<!-- Main Content -->
<section class="content">
   <div class="container-fluid">

      <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
            <a href="?page=ulasan_tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Plus Ulasan</a>
            <table id="example2" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>User</th>
                     <th>Buku</th>
                     <th>Ulasan</th>
                     <th>Rating</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $i = 1;
                  $query = mysqli_query($connection, "SELECT * FROM ulasanbuku LEFT JOIN user ON ulasanbuku.UserID = user.UserID LEFT JOIN buku ON ulasanbuku.BukuID = buku.BukuID");
                  while ($data = mysqli_fetch_array($query)) :
                     ?>
                     <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['NamaLengkap'] ?></td>
                        <td><?= $data['Judul'] ?></td>
                        <td><?= $data['Ulasan'] ?></td>
                        <td><i class="fa fa-star mr-3" style="color: orange;"></i><?= $data['Rating'] ?></td>
                        <td>
                           <a href="?page=ulasan_edit&&id=<?php echo $data['UlasanID']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <a onclick="return confirm('Are you sure?')" href="?page=ulasan_hapus&&id=<?php echo $data['UlasanID']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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