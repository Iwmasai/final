<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'db-connect.php';

ob_start(); // バッファリング開始

$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('DELETE FROM ra_men WHERE id = ?');
if ($sql->execute([$_POST['id']])) {
    header('Location: menu.php');
    exit;
} else {
    echo '削除に失敗しました。';
}

ob_end_flush(); // バッファリング終了
?>
<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset="UTF-8">
    <title>delete.php</title>
</head>
<body>
    <button onclick="location.href='menu.php'">トップへ戻る</button>
</body>
</html>
