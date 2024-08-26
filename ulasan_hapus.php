<?php

$id = $_GET['id'];
$query = mysqli_query($connection, "DELETE FROM ulasanbuku WHERE UlasanID = $id");

?>

<script>
   alert("Success"); location.href="index.php?page=ulasan"
</script>