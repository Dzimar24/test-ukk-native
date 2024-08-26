<?php

$id = $_GET['id'];
$query = mysqli_query($connection, "DELETE FROM kategori WHERE KategoriID = $id");

?>

<script>
   alert("Success"); location.href="index.php?page=kategori"
</script>