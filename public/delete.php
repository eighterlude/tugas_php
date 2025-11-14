<?php
require_once '../src/ProductRepo.php';

$repo = new ProductRepo();

$id = $_GET['id'];

if ($repo->delete($id)) {
    header("Location: index.php");
    exit;
}


