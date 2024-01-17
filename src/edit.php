<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset="UTF-8">
    <title>更新</title>
    <style>
        body {
            text-align: center;
            font-size: 18px;
            margin: 20px;
        }

        h1 {
            font-size: 24px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
        }

        form {
            display: inline;
        }

        select, input[type="text"], input[type="submit"] {
            padding: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>更新</h1>
    <table>
        <tr>
            <th>店舗名</th>
            <th>カテゴリー</th>
            <th>住所</th>
            <th>操作</th>
        </tr>

        <?php
        $query = 'SELECT ra_men.id, ra_men.name, category.category_id, category_name, ra_men.address
                  FROM ra_men
                  LEFT JOIN category ON ra_men.category_id = category.category_id';
        foreach ($pdo->query($query) as $row) {
            echo '<tr>';
            echo '<td>', $row['name'], '</td>';
            echo '<td>', $row['category_name'], '</td>';
            echo '<td>', $row['address'], '</td>';
            echo '<td>';
            echo '<form action="update.php" method="post">';
            echo '<input type="hidden" name="id" value="', $row['id'], '">';
            echo '<input type="text" name="name" value="', $row['name'], '">';
            echo '<select name="category">';
            $categories = ['とんこつ', '魚介とんこつ', '塩', '醤油', '味噌'];
            foreach ($categories as $key => $category) {
                $selected = ($key + 1 == $row['category_id']) ? 'selected' : '';
                echo '<option value="' . ($key + 1) . '" ' . $selected . '>' . $category . '</option>';
            }
            echo '</select>';
            echo '<input type="text" name="address" value="', $row['address'], '">';
            echo '<input type="submit" value="更新">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
    <button onclick="location.href='menu.php'">トップへ戻る</button>
</body>
</html>
