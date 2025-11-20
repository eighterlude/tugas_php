<?php

require_once 'Database.php';
require_once 'Product.php';

class ProductRepo {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $category, $price, $stock, $image_path, $status) {
        $sql = "INSERT INTO products (name, category, price, stock, image_path, status)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $category, $price, $stock, $image_path, $status]);
    }

    public function update($id, $name, $category, $price, $stock, $image_path, $status) {
        $sql = "UPDATE products 
                SET name=?, category=?, price=?, stock=?, image_path=?, status=?
                WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $category, $price, $stock, $image_path, $status, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id=?");
        return $stmt->execute([$id]);
    }
}
