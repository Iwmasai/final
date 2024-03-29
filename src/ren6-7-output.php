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
    <title>練習6-7</title>
</head>
<body>
<?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('DELETE FROM product WHERE id = ?');
    if ($sql->execute([$_GET['id']])) {
        echo '削除に成功しました。';
    } else {
        echo '削除の失敗しました。';
    }
?>
    <br><hr><br>
    <table>
        <tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>

<?php
    foreach ($pdo->query('SELECT * FROM product') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    <form action="ren6-7-input.php" method="post">
        <button type="submit">削除画面に戻る</button>
    </form>
</body>
</html>