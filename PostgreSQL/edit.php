<?php
// DB接続
$dbh = new PDO(
    'pgsql:host=localhost port=5432 dbname=postgres',
    'pgadmin', // ユーザー名
    'pgadmin', // パスワード
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
if(isset($_GET['id'])&& ctype_digit($_GET['id'])){
    $sth = $dbh->prepare('SELECT id, name, price FROM item WHERE id=:id');
    $sth->execute(['id' => $_GET['id']]);
    $origin = $sth->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<title>アイテムの追加</title>
<form action="do.php" method="post">
    <dl>
        <dt>ID</dt>
        <dd>
<?php if(empty($origin)): ?>
            <input type="hidden" name="mode" value="ins"/>
            <input type="text" name="id" value=""/>
<?php else: ?>
            <input type="hidden" name="mode" value="upd"/>
            <?php echo htmlspecialchars($origin['id'], ENT_QUOTES); ?>
            <input type="hidden" name="id" value="<?php echo htmlentities($origin['id'], ENT_QUOTES); ?>" />
<?php endif; ?>
        </dd>
        <dt>名称</dt>
        <dd>
            <input type="text" name="name" value="<?php echo empty($origin)? '': htmlspecialchars($origin['name'], ENT_QUOTES); ?>"/>
        </dd>
        <dt>価格</dt>
        <dd>
            <input type="text" name="price" value="<?php echo empty($origin)? '': htmlspecialchars($origin['price'], ENT_QUOTES); ?>"/>
        </dd>
    </dl>
    <input type="submit" value="<?php echo empty($origin) ? '新規登録':'変更'; ?>する"/>
</form>