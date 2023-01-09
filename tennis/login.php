<?php
    session_start(); // セッション開始
    if (isset($_SESSION['id'])){
        // セッションにユーザIDがある=ログインしている
        // ログイン済みならトップページに遷移する
        header('Location: index.php');
    }else if(isset($_POST['name']) && isset($_POST['password']) ){
        // ログインしていないがユーザ名とパスワードが送信されたときDBに接続
        $dsn = 'pgsql:host=localhost port=5432 dbname=tennis';
        $user = 'pgadmin';
        $password = 'pgadmin';
        try{
            // PDOインスタンスの作成
            $db = new PDO($dsn, $user, $password);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // プリペアドステートメントを作成
            $stmt = $db->prepare('SELECT * FROM users WHERE name=:name AND password=:pass');
            // プリペアドステートメントにパラメータを割り当てる
            $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
            $stmt->bindParam(':pass', hash("sha256", $_POST['password']), PDO::PARAM_STR);

            // クエリの実行
            $stmt->execute();

            if($row = $stmt->fetch()){
                // セッションID再作成
                session_regenerate_id(true);
                // ユーザが存在していたら、セッションにユーザIDをセット
                $_SESSION['id'] = $row['id'];
                header('Location: index.php');
            }else{
                // 1レコードも取得できなかったとき
                // ユーザ名・パスワードが間違っている可能性あり
                // もう一度ログインフォームを表示
                header('Location: login.php');
                exit();
            }

        }catch( PDOException $e ){
            exit('エラー'.$e->getMessage());
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>サークルサイト</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style type="text/css">
            form{
                width:100%px;
                max-width: 330px;
                padding: 15px;
                margin:auto;
                text-align: center;
            }
            #name {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            #password{
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>
    </head>
    <body>
        <main role="main" class="container" style="padding:60px 15px 0">
            <div>
                <!-- ここから本文 -->
                <form action="login.php" method="post">
                    <h1>サークルサイト</h1>
                    <label class="sr-only">ユーザ名</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="ユーザ名" />
                    <label class="sr-only">パスワード</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="パスワード" />
                    <input type="submit" class="btn btn-primary btn^block" value="ログイン"/>
                </form>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script>windows.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"<\/script>')</script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>