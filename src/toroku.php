<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<?php
$pdo = new PDO($connect,USER, PASS);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/toroku.css">
    <title>商品登録</title>
</head>
<body>
<form action="toroku2.php" method="post">
    商品名：<br><input type="text" name="name"><br>
    金額：<br><input type="text" name="price"><br>
    <p><button type="submit">商品登録</button></p>
    </form>
</body>
</html>