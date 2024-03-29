<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ラーメン店一覧</title>
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
    </style>
</head>
<body>
    <h1>ラーメン店一覧</h1>
    <button onclick="location.href='ra-men-input.php'">登録</button>
    <table>
        <tr>
            <th>店名</th>
            <th>カテゴリー</th>
            <th>住所</th>
            <th>操作</th>
        </tr>

        <?php
        $query = 'SELECT ra_men.id, ra_men.name, category.category_name, ra_men.address
                  FROM ra_men
                  LEFT JOIN category ON ra_men.category_id = category.category_id';

        foreach ($pdo->query($query) as $row) {
            echo '<tr>';
            echo '<td>', $row['name'], '</td>';
            echo '<td>', $row['category_name'], '</td>';
            echo '<td>', $row['address'], '</td>';
            echo '<td>';
            echo '<form action="edit.php" method="post">';
            echo '<input type="hidden" name="id" value="', $row['id'], '">';
            echo '<button type="submit">更新</button>';
            echo '</form>';
            echo '<form action="delete.php" method="post">';
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
