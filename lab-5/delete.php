<?php
$id = $_GET['id'];
$connect = mysqli_connect('127.0.0.1','root','','Knives');
$del = "DELETE FROM Knives WHERE id = '$id'";
$res = mysqli_query($connect,$del);
header('location: index.php?page_layout=list');
?>

