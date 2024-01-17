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
		<title>更新後</title>
	</head>
	<body>
    <button onclick = "location.href='list.php'">トップへ戻る</button>
<?php
    $pdo=new PDO($connect, USER, PASS);
    // SQL発行準備 prepareメソッド　作成２
    $sql=$pdo->prepare('update Bax set drink_mei=?, price=? where drink_id=?');
    if (empty($_POST['drink_mei'])) {
        echo '商品名を入力してください。';
    } else
    if (!preg_match('/[0-9]+/', $_POST['price'])) {
        echo '商品価格を整数で入力してください。';
    } else
    //SQLを発行 excuteメソッド　作成３
    if ($sql->execute([htmlspecialchars($_POST['drink_mei']), $_POST['price'], $_POST['drink_id']])){
        echo '更新に成功しました。';
    } else{
        echo '更新に失敗しました。';
    }
    //更新に成功しました　作成４
    //更新に失敗しまし　作成５
    
?>
        <hr>
        <table>
        <tr><th>ドリンク番号</th><th>ドリンク名</th><th>価格</th></tr>

<?php
foreach ($pdo->query('select * from Bax') as $row) {
    echo '<tr>';
    echo '<td>', $row['drink_id'], '</td>';
    echo '<td>', $row['drink_mei'], '</td>';
    echo '<td>', $row['price'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
        </table>
    </body>
</html>