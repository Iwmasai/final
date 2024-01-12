<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1517350-final';
    const USER = 'LAA1517350';
    const PASS = 'Pass0902';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
    ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>ラーメン店一覧</h1>
<table>
    <tr><th>店名</th><th>住所</th><th>カテゴリー</th>
<?php
    $pdo=new PDO($connect, USER,PASS);
    foreach($pdo->query('select * from ra-men')as $row) {
        echo '<tr>';
        echo '<td>',$row['name'],'</td>';
        echo '<td>',$row['address'],'</td>';
        echo '</tr>';
        echo "\n";
        }
        ?>
        </table>
</body>
</html>