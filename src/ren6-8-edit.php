<?php
    const SERVER = 'mysql214.phy.lolipop.lan';
    const DBNAME = 'LAA1517350-shop';
    const USER = 'LAA1517350';
    const PASS = 'Pass0902';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset="UTF-8">
    <title>練習6-8</title>
</head>
<body>
    <table>
        <tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>
<?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->query('SELECT * FROM product');
    foreach ($sql as $row) {
        echo '<tr>';
        echo '<form action="ren6-6-output.php" method="post">';
        echo '<td>';
        echo '<input type="text" name="id" value="', $row['id'], '">';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="name" value="', $row['name'], '">';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="price" value="', $row['price'], '">';
        echo '</td>';
        echo '<td><input type="submit" value="更新"></td>';
        echo '</form>';
        echo '</tr>';
        echo "\n";
    }
?>
</table>
<button onclick="location.href='ren6-8-top.php'">トップへ戻る</button>
</body>
</html>