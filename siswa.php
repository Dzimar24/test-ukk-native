<h1 class="text-center mb-3">Siswa</h1>

<!-- Main Content -->
<section class="content">
   <div class="container-fluid">

      <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
            <a href="?page=siwa-tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Siswa</a>
            <table id="example2" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>NIS</th>
                     <th>Almat</th>
                     <th>Tanggal Lahir</th>
                     <th>Image Siswa</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $i = 1;
                  $query = mysqli_query($connection, "SELECT * FROM siswa");
                  while ($data = mysqli_fetch_array($query)):
                     ?>
                     <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['nis'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td><?= $data['tanggalLahir'] ?></td>
                        <td><img src="/uploads/<?= $data['image'] ?>" alt="Tol"></td>
                        <td>
                           <a href="?page=peminjaman_edit&&id=<?php echo $data['idSiswa']; ?>"
                              class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <a onclick="return confirm('Are you sure?')"
                              href="?page=peminjaman_hapus&&id=<?php echo $data['idSiswa']; ?>"
                              class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                     </tr>
                  <?php $i++; endwhile; ?>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</section>
<!-- End Main Content -->

<!-- Connection Js -->