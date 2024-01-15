<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>練習6-5</title>
</head>
<body>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('INSERT INTO ra-men ( name, address) VALUES ( ?, ?)');
    
    if (empty($_POST['name'])) {
        echo '店舗名を入力してください。';
    } else {
        // ここで category_id を指定
        $category_id = $_POST['category'];

        if ($sql->execute([$_POST['name'], $_POST['address'], $category_id])) {
            echo '<font color="red">追加に成功しました。</font>';
        } else {
            echo '<font color="red">追加に失敗しました。</font>';
        }
    }
    ?>
    
    <form action="ra-men-input.php" method="post">
        <button type="submit">追加画面に戻る</button>
    </form>
</body>
</html>
