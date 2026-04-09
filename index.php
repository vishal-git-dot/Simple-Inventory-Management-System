<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Inventory Management</h2>

<form method="POST" action="add.php">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="text" name="category" placeholder="Category" required>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <button type="submit">Add Product</button>
</form>

<h3>Product List</h3>
<form method="GET" action="index.php">
    <input type="text" name="search" placeholder="Search product..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <button type="submit">Search</button>
</form>
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Quantity</th>
<th>Action</th>
</tr>

<?php
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

if (!empty($search)) {
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%' OR category LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM products";
}


$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "<tr>\n    <td>{$row['id']}</td>\n    <td>{$row['product_name']}</td>\n    <td>{$row['category']}</td>\n    <td>{$row['price']}</td>\n    <td>{$row['quantity']}";

    if ($row['quantity'] < 5) {
        echo " <span style='color:red;'>(Low)</span>";
    }

    echo "</td>\n    <td>
    <a href='delete.php?id={$row['id']}'>Delete</a> |
    <a href='edit.php?id={$row['id']}'>Edit</a>
    </td>\n    </tr>";
}
?>
</table>
</body>
</html>
