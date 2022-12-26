<?php 

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'bazaarchai_only_php');

$id = $_POST['id'];
$category = $_POST['category'];
$name = $_POST['name'];
$price = $_POST['price'];
$unit = $_POST['unit'];

$sql_insert = "INSERT INTO products (id, category, name, price, unit) VALUES ('$id', '$category', '$name', '$price', '$unit')";
mysqli_query($conn, $sql_insert);
header ("location: products.php");


?>