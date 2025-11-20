<?php
require_once '../src/ProductRepo.php';

$repo = new ProductRepo();
$products = $repo->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>

<h1>Product List</h1>

<a href="create.php">+ Add New Product</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Status</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    <?php foreach ($products as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['name'] ?></td>
        <td><?= $p['category'] ?></td>
        <td><?= $p['price'] ?></td>
        <td><?= $p['stock'] ?></td>
        <td><?= $p['status'] ?></td>
        <td>
            <?php if (!empty($p['image_path'])): ?>
                <img src="uploads/<?= $p['image_path'] ?>" width="80">
            <?php endif; ?>
        </td>
        <td>
            <a href="edit.php?id=<?= $p['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $p['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
