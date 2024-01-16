<?php
require 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $address = $_POST['address'];

    $updateQuery = 'UPDATE ra_men SET name=?, category_id=?, address=? WHERE id=?';
    $updateStatement = $pdo->prepare($updateQuery);
    $updateStatement->execute([$name, $category, $address, $id]);
    
    header('Location: menu.php');
    exit;
}
?>
