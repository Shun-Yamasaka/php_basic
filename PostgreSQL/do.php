<?php
$dbh = new PDO(
    'pgsql:host=localhost port=5432 dbname=postgres',
    'pgadmin', // ユーザー名
    'pgadmin', // パスワード
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
switch (isset($_POST['mode']) ? $_POST['mode'] : null ) {
    case 'ins': // INSERT
        $sth = $dbh->prepare(
            'INSERT INTO item(id, name, price) VALUES (:id, :name, :price)'
        );
        $ret = $sth->execute([
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price']
        ]);
        break;

    case 'upd': // UPDATE
        $sth = $dbh->prepare(
            'UPDATE item SET name = :name, price = :price WHERE id = :id'
        );
        $ret = $sth->execute([
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price']
        ]);
        break;

    case 'del': // DELETE
        $sth = $dbh->prepare(
            'DELETE FROM item WHERE id = :id'
        );
        $ret = $sth->execute(['id' => $_POST['id']]);
        break;

    default:
        exit('unknown mode "'. htmlspecialchars($_POST['mode']).'"');
}
header('Location: http://localhost/list.php');
?>