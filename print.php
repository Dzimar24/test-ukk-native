<?php include './connection.php'; ?>

<h2 style="text-align: center; margin: 30px;">Laporan Peminjaman Buku</h2>

<table border="1" collspacing="0" callpadding="5" width="100%">
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
            <td><?= $data['TanggalPeminjaman'] ?></td>
            <td><?= $data['TanggalPengembalian'] ?></td>
            <td><?= $data['StatusPeminjaman'] ?></td>
            <?php $i++; endwhile; ?>
</table>

<script>
   window.print();
   setTimeout(() => {
      window.close();
   }, 100);
</script>
