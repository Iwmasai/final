<?php
require 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $address = $_POST['address'];

    try {
        $updateQuery = 'UPDATE ra_men SET name=?, category_id=?, address=? WHERE id=?';
        $updateStatement = $pdo->prepare($updateQuery);
        $updateStatement->execute([$name, $category, $address, $id]);
        
        // 更新された行数を取得
        $updatedRows = $updateStatement->rowCount();
        echo '更新された行数: ' . $updatedRows;

        header('Location: menu.php');
        exit;
    } catch (PDOException $e) {
        // エラーハンドリング
        echo 'エラー: ' . $e->getMessage();
    }
}
?>
