<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Product</h2>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="text" name="name" value="<?php echo $row['product_name']; ?>" required>
    <input type="text" name="category" value="<?php echo $row['category']; ?>" required>
    <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>" required>
    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required>
    <button type="submit">Update Product</button>
</form>

</body>
</html>
