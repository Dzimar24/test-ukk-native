<h1 class="text-center mb-3">Laporan Peminjaman Buku</h1>

<!-- Main Content -->
<section class="content">
   <div class="container-fluid">

      <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
            <a href="print.php" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Laporan</a>
            <table id="example2" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>User</th>
                     <th>Buku</th>
                     <th>Tanggal Peminjaman</th>
                     <th>Tanggal Pengembailian</th>
                     <th>Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $i = 1;
                  $query = mysqli_query($connection, "SELECT * FROM peminjaman LEFT JOIN user ON peminjaman.UserID = user.UserID LEFT JOIN buku ON peminjaman.BukuID = buku.BukuID");
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
                        <?php $i++; endwhile; ?>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</section>
<!-- End Main Content -->

<!-- Connection Js -->