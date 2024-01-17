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
		<title>更新前</title>
	</head>
	<body>
    <table>
    <tr><th>ドリンク番号</th><th>ドリンク名</th><th>価格</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from Bax where drink_id=?');
    $sql->execute([$_GET['drink_id']]);
		foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="kosin2.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="drink_id" value="', $row['drink_id'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="drink_mei" value="', $row['drink_mei'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="price" value="', $row['price'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<button onclick="location.href='list.php'">トップへ戻る</button>
    </body>
</html>