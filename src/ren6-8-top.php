<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset="UTF-8">
    <title>練習6-7</title>
</head>
<body>
    <table>
        <tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>

    <?php
    $pdo = new PDO($connect, USER, PASS);
    foreach ($pdo->query('SELECT * FROM product') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '<td>';
        echo '<form action="ren6-8-edit.php" method="post">';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="ren6-8-delete.php" method="post">';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
    </table>
</body>
</html>