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
            <td><a href="edit.php">新規登録</a></td>
        </tr>
    </thead>
    <tbody>
<?php foreach($rows as $r): ?>
        <tr>
            <td><?php echo htmlspecialchars($r['id'], ENT_QUOTES); ?></td>
            <td><?php echo htmlspecialchars($r['name'], ENT_QUOTES); ?></td>
            <td><?php echo htmlspecialchars(number_format($r['price']), ENT_QUOTES); ?></td>
            <td>
                <a href="edit.php?id=<?php echo rawurlencode($r['id']) ?>">変更</a>
                <form action="do.php" method="post" onsubmit="return confirm('本当に削除しますか？');">
                    <input type="hidden" name="mode" value="del"/>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($r['id'], ENT_QUOTES) ?>"/>
                    <input type="submit" value="削除"/>
                </form>
            </td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table>
<?php endif;