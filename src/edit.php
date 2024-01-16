<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset="UTF-8">
    <title>練習6-8</title>
</head>
<body>
    <table>
        <tr><th>店舗名</th><th>カテゴリー</th><th>住所</th></tr>
        <?php
        $query = 'SELECT ra_men.id, ra_men.name, category.category_id, category_name, ra_men.address
                  FROM ra_men
                  LEFT JOIN category ON ra_men.category_id = category.category_id';
        foreach ($pdo->query($query) as $row) {
            echo '<tr>';
            echo '<form action="update.php" method="post">';
            echo '<td>';
            echo '<input type="text" name="name" value="', $row['name'], '">';
            echo '</td>';
            echo '<td>';
            echo '<select name="category">';
            $categories = ['とんこつ', '魚介とんこつ', '塩', '醤油', '味噌'];
            foreach ($categories as $key => $category) {
                $selected = ($key + 1 == $row['category_id']) ? 'selected' : '';
                echo '<option value="' . ($key + 1) . '" ' . $selected . '>' . $category . '</option>';
            }
            echo '</select>';
            echo '</td>';
            echo '<td>';
            echo '<input type="text" name="address" value="', $row['address'], '">';
            echo '</td>';
            echo '<td><input type="submit" value="更新"></td>';
            echo '</form>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
    <button onclick="location.href='menu.php'">トップへ戻る</button>
</body>
</html>
