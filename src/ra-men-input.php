<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ラーメン店登録</title>
</head>
<body>
    <p>ラーメン店を追加します。</p>
    <form action="ra-men-output.php" method="post">
        店舗名: <input type="text" name="name"><br>
        カテゴリー: 
        <select name="category">
            <option value="1">とんこつ</option>
            <option value="2">魚介とんこつ</option>
            <option value="3">塩</option>
            <option value="4">醤油</option>
            <option value="5">味噌</option>
        </select><br>
        住所: <input type="text" name="address"><br>
        <input type="submit" value="追加">
        <input type="submit" value="戻る">
    </form>
</body>
</html>
