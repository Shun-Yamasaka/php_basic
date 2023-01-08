<?php
$dbh = new PDO(
    'pgsql:host=localhost port=5432 dbname=postgres',
    'pgadmin', // ユーザー名
    'pgadmin', // パスワード
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
$sth = $dbh->prepare(
    'INSERT INTO item(id, name, price) VALUES (:id, :name, :price)'
);
$ret = $sth->execute([
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price']
]);
header('Location: http://localhost/list.php');
?>