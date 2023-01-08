<?php
// PostgreSQL接続
$dbh = new PDO(
    'pgsql:host=localhost port=5432 dbname=postgres',
    'pgadmin', // ユーザー名
    'pgadmin', // パスワード
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
?>
<!DOCTYPE html>
<title>データベース接続テスト</title>
<p>データベースの接続に成功しました</p>