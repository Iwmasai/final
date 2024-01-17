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

        // $id をバインド
        $updateStatement->bindParam(1, $name, PDO::PARAM_STR);
        $updateStatement->bindParam(2, $category, PDO::PARAM_INT);
        $updateStatement->bindParam(3, $address, PDO::PARAM_STR);
        $updateStatement->bindParam(4, $id, PDO::PARAM_INT);

        $updateStatement->execute();

        // 更新された行数を取得
        // 更新された行数を取得
        $updatedRows = $updateStatement->rowCount();
        echo '更新された行数: ' . $updatedRows;

        // リダイレクト
        header('Location: menu.php');
        exit;

    } catch (PDOException $e) {
        // エラーハンドリング
        echo 'エラー: ' . $e->getMessage();
    }
}
?>
