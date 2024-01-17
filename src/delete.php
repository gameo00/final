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
		<title>練習6-7-output</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from Bax where drink_id=?');
    if ($sql->execute([$_POST['drink_id']])) {
        echo '削除に成功しました。';
    }else {
        echo '削除に失敗しました。';
    }
    ?>
    <br><hr><br>
	<table>
    <tr>
                <th>選択</th>
                <th>ドリンクID</th>
                <th>ドリンク名</th>
                <th>価格</th>
            </tr>
    <?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query(' select * from Bax ') as $row) {
        echo '<td><input type="radio" name="a" value="',$row['drink_id'],'" ></td>';
        echo '<td>', $row['drink_id'], '</td>';
        echo '<td>', $row['drink_mei'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
</table>
<button onclick="location.href='list.php'">トップへ戻る</button>
    </body>
</html>