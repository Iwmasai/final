<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517350-final';
const USER = 'LAA1517350';
const PASS = 'Pass0902';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';

$pdo = new PDO($connect, USER, PASS);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ラーメン店一覧</title>
</head>
<body>
    <h1>ラーメン店一覧</h1>
    <table>
        <tr>
            <th>店名</th>
            <th>カテゴリー</th>
            <th>住所</th>
        </tr>

        <?php
        $query = 'SELECT ra_men.name, category.category_name, ra_men.address
                  FROM ra_men
                  LEFT JOIN category ON ra_men.category_id = category.category_id';

        foreach ($pdo->query($query) as $row) {
            echo '<tr>';
            echo '<td>', $row['name'], '</td>';
            echo '<td>', $row['category_name'], '</td>';
            echo '<td>', $row['address'], '</td>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
</body>
</html>
