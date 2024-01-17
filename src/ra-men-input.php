<!-- ra-men-input.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ラーメン店登録</title>
    <style>
        body {
            text-align: center;
            font-size: 18px;
            margin: 20px;
        }

        p {
            font-size: 20px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select, input[type="text"], input[type="submit"] {
            padding: 8px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 18px;
        }

        input[type="submit"]:first-child {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <p>ラーメン店を追加します。</p>
    <form action="ra-men-output.php" method="post">
        <label for="name">店舗名:</label>
        <input type="text" name="name" id="name"><br>

        <label for="category">カテゴリー:</label>
        <select name="category" id="category">
            <option value="1">とんこつ</option>
            <option value="2">魚介とんこつ</option>
            <option value="3">塩</option>
            <option value="4">醤油</option>
            <option value="5">味噌</option>
        </select><br>

        <label for="address">住所:</label>
        <input type="text" name="address" id="address"><br>

        <input type="submit" value="追加">
        <input type="button" value="戻る" onclick="location.href='menu.php'">
    </form>
</body>
</html>
