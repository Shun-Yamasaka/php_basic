<?php
// DB接続
$dbh = new PDO(
    'pgsql:host=localhost port=5432 dbname=postgres',
    'pgadmin', // ユーザー名
    'pgadmin', // パスワード
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
// SELECT文
$sth = $dbh->query(
    'SELECT id, name, price'
    .' FROM item'
    .' ORDER BY id'
);
// rows配列にqueryメソッドの実行結果を格納
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<title>アイテムの一覧</title>
<?php if (!$rows): ?>
<div>アイテムが見つかりませんでした</div>
<?php else: ?>
<table>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">名称</th>
            <th scope="col">価格</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($rows as $r): ?>
        <tr>
            <td><?php echo htmlspecialchars($r['id']); ?></td>
            <td><?php echo htmlspecialchars($r['name']); ?></td>
            <td><?php echo htmlspecialchars(number_format($r['price'])); ?></td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table>
<?php endif;