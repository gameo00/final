<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<?php
    $pdo = new PDO($connect, USER, PASS);
?>

    <!DOCTYPE html>
    <html lang="ja">
         <head>
             <meta charset="UTF-8">
             <link rel="stylesheet" href="css/toroku.css">
             <title>商品登録</title>
         </head>
         <body>
         <button onclick = "location.href='list.php'">トップへ戻る</button>
            <?php
                 $pdo = new PDO($connect, USER, PASS);
                 $sql=$pdo->prepare('insert into Bax(drink_mei, price) values (?, ?)');
                 if (empty($_POST['name'])){
                     echo '商品名を入力してください。';
                 }else if (!preg_match('/^[0-9]+$/', $_POST['price'])){
                     echo '商品価格を整数で入力してください。';
                 }else if ($sql->execute([ $_POST['name'], $_POST['price'] ])){
                     echo '<font color="red">追加に成功しました。 </font>';
                 } else {
                     echo '<font color="red">追加に失敗しました。 </font>';
                 }
            ?>
                 <br><hr><br>
                 <table>
                    <tr><th>商品名</th><th>金額</th></tr>
            <?php        
                 foreach ($pdo->query('select * from Bax') as $row) {
                    echo '<tr>';
                    echo '<td>',$row['drink_mei'],'</td>';
                    echo '<td>',$row['price'],'</td>';
                    echo '</tr>';
                    echo "\n";
                    }
            ?>
            </table>
         </body>
    </html>