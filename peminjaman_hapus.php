<?php

$id = $_GET['id'];
$query = mysqli_query($connection, "DELETE FROM peminjaman WHERE PeminjamanID = $id");

?>

<script>
   alert("Success"); location.href="index.php?page=peminjaman"
</script>