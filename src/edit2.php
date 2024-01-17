<?php
require 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームから送信されたデータを取得
    $id = $_POST['id'];

    // データベースから該当の情報を取得
    $selectQuery = 'SELECT * FROM ra_men WHERE id = :id';
    $stmt = $pdo->prepare($selectQuery);
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // 編集フォームが送信された場合
    if ($_POST['edit_submit']) {
        $editedName = $_POST['edited_name'];
        $editedCategory = $_POST['edited_category'];
        $editedAddress = $_POST['edited_address'];

        // データベースを更新
        $updateQuery = 'UPDATE ra_men
                        SET name = :name, category_id = :category, address = :address
                        WHERE id = :id';
        $stmt = $pdo->prepare($updateQuery);
        $stmt->execute([':name' => $editedName, ':category' => $editedCategory, ':address' => $editedAddress, ':id' => $id]);

        // 更新後の処理（例: 成功メッセージの表示やリダイレクトなど）
        header('Location: menu.php');
        exit();
    }
} else {
    // GET メソッドでアクセスされた場合の処理を追加
    // 例えば、編集フォームの表示など
}
?>
