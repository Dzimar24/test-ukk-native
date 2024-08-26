<?php

$id = $_GET['id'];
$query = mysqli_query($connection, "DELETE FROM buku WHERE BukuID = $id");

?>

<script>
   alert("Success"); location.href="index.php?page=buku"
</script>