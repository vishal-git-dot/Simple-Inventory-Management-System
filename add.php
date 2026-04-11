<?php
include 'db.php';

$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO products (product_name, category, price, quantity)
VALUES ('$name', '$category', '$price', '$quantity')";

$conn->query($sql);
header("Location: index.php");
?>
