<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'db-connect.php';

$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('INSERT INTO ra-men (name, address, category_id) VALUES (?, ?, ?)');

if (empty($_POST['name'])) {
    echo '店舗名を入力してください。';
} else {
    $category_id = $_POST['category'];

    if ($sql->execute([$_POST['name'], $_POST['address'], $category_id])) {
        // 登録が成功したら menu.php にリダイレクト
        header('Location: menu.php');
        exit;
    } else {
        echo '<font color="red">追加に失敗しました。</font>';
    }
}
?>

<form action="ra-men-input.php" method="post">
    <button type="submit">追加画面に戻る</button>
</form>
