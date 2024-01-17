<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<?php
$pdo = new PDO($connect,USER, PASS);
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta http-equiv="Cache-Control" content="no-cache">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/itiran.css">
        <title>一覧</title>
    </head>
        <body>
            <form action="toroku.php" method="post"></form>
            <h1>ドリンク一覧</h1>
        <table border="1">
            <tr>
                <th>選択</th>
                <th>ドリンクID</th>
                <th>ドリンク名</th>
                <th>価格</th>
            </tr>
    <?php
    $pdo=new PDO($connect, USER, PASS);
    echo '<form action="delete" method="post">';
    foreach ($pdo->query(' select * from Bax ') as $row) {
        echo '<td><input type="radio" name="drink_id" value="',$row['drink_id'],'" cheked></td>';
        echo '<td>', $row['drink_id'], '</td>';
        echo '<td>', $row['drink_mei'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
        </table>
    <?php
        echo '<a href="kosin1.php?drink_id=',$row['drink_id'],'">更新</a>';
        ?>
        <button type="submit">削除</button>
        <a href="toroku.php">商品登録</a>
    </form>
    </body>
</html>