<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$sql = "UPDATE products SET 
product_name='$name', 
category='$category', 
price='$price', 
quantity='$quantity' 
WHERE id=$id";

$conn->query($sql);
header("Location: index.php");
?>
