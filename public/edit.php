<?php
require_once '../src/ProductRepo.php';

$repo = new ProductRepo();

$id = $_GET['id'];
$product = $repo->getById($id);

if (!$product) {
    die("Product not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];

    $image_path = $product['image_path'];

    if (!empty($_FILES['image']['name'])) {
        $fileName = time() . "_" . $_FILES['image']['name'];
        $target = "uploads/" . $fileName;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $image_path = $fileName;
    }

    if ($repo->update($id, $name, $category, $price, $stock, $image_path, $status)) {
        header("Location: index.php");
        exit;
    } 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<form method="post" enctype="multipart/form-data">
    Name: <br>
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br><br>

    Category: <br>
    <input type="text" name="category" value="<?= $product['category'] ?>" required><br><br>

    Price: <br>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br><br>

    Stock: <br>
    <input type="number" name="stock" value="<?= $product['stock'] ?>" required><br><br>

    Status: <br>
    <select name="status">
        <option value="active" <?= $product['status']=='active'?'selected':'' ?>>Active</option>
        <option value="inactive" <?= $product['status']=='inactive'?'selected':'' ?>>Inactive</option>
    </select><br><br>

    Current Image: <br>
    <?php if ($product['image_path']): ?>
        <img src="uploads/<?= $product['image_path'] ?>" width="80"><br>
    <?php endif; ?>
    Upload New Image: <br>
    <input type="file" name="image"><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="index.php">Back</a>

</body>
</html>
