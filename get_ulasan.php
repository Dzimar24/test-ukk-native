<?php
include './connection.php';

$userID = $_GET['userID'];
$bukuID = $_GET['bukuID'];

$query = mysqli_query($connection, "SELECT * FROM ulasanbuku WHERE UserID = '$userID' AND BukuID = '$bukuID'");
$data = mysqli_fetch_assoc($query);

echo json_encode($data);
?>
