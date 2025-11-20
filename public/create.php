<?php
require_once '../src/ProductRepo.php';

$repo = new ProductRepo();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];

    // Upload file
    $image_path = "";
    if (!empty($_FILES['image']['name'])) {
        $fileName = time() . "_" . $_FILES['image']['name'];
        $target = "uploads/" . $fileName;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $image_path = $fileName;
    }

    if ($repo->create($name, $category, $price, $stock, $image_path, $status)) {
        header("Location: index.php");
        exit;
    } else {
        $message = "Failed to add product.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h1>Add Product</h1>

<form method="post" enctype="multipart/form-data">
    Name: <br>
    <input type="text" name="name" required><br><br>

    Category: <br>
    <input type="text" name="category" required><br><br>

    Price: <br>
    <input type="number" step="0.01" name="price" required><br><br>

    Stock: <br>
    <input type="number" name="stock" required><br><br>

    Status: <br>
    <select name="status">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select><br><br>

    Image: <br>
    <input type="file" name="image"><br><br>

    <button type="submit">Save</button>
</form>

<br>
<a href="index.php">Back</a>

</body>
</html>
