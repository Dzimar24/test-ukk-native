<h1 class="text-center mb-3">Laporan Peminjaman Buku</h1>

<!-- Main Content -->
<section class="content">
   <div class="container-fluid">

      <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
            <a href="?page=peminjaman-tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Peminjaman</a>
            <table id="example2" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>User</th>
                     <th>Buku</th>
                     <th>Tanggal Peminjaman</th>
                     <th>Tanggal Pengembailian</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $i = 1;
                  $query = mysqli_query($connection, "SELECT * FROM peminjaman LEFT JOIN user ON peminjaman.UserID = user.UserID LEFT JOIN buku ON peminjaman.BukuID = buku.BukuID WHERE peminjaman.UserID =" . $_SESSION['user']['UserID']);
                  while ($data = mysqli_fetch_array($query)):
                     ?>
                     <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['NamaLengkap'] ?></td>
                        <td><?= $data['Judul'] ?></td>
                        <td><?= date("l, d F Y", strtotime($data['TanggalPeminjaman'])) ?></td>
                        <td><?= date("l, d F Y", strtotime($data['TanggalPengembalian'])) ?></td>
                        <?php if ($data['StatusPeminjaman'] == 'Dipinjam'): ?>
                           <td><span class="badge badge-danger">Dipinjam</span></td>
                        <?php else: ?>
                           <td><span class="badge badge-success">Dikembalikan</span></td>
                        <?php endif; ?>
                        <td>
                           <?php if ($data['StatusPeminjaman'] == 'Dipinjam'): ?>
                              <a href="?page=peminjaman_edit&&id=<?php echo $data['PeminjamanID']; ?>"
                                 class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                              <a onclick="return confirm('Are you sure?')"
                                 href="?page=peminjaman_hapus&&id=<?php echo $data['PeminjamanID']; ?>"
                                 class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                           <?php endif; ?>
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