<?php
    // データの受け取り
    $id = intval($_POST['id']);
    $pass = $_POST['pass'];

    // 必須項目チェック
    if($id == '' || $pass == ''){
        header('Location: bbs.php');
        exit();
    }

    // DBに接続
    $dsn = 'pgsql:host=localhost port=5432 dbname=tennis';
    $user = 'pgadmin';
    $password = 'pgadmin';

    try{
        // PDOインスタンスの作成
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // プリペアドステートメントを作成
        $stmt = $db->prepare('DELETE FROM bbs WHERE id=:id AND pass=:pass');
        // プリペアドステートメントにパラメータを割り当てる
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        // クエリの実行
        $stmt->execute();
    }catch( PDOException $e ){
        exit('エラー'.$e->getMessage());
    }
    // bbs.phpに戻る
    header('Location: bbs.php');
    exit();
?>
