<!-- infoファイルの読込み -->
<?php $fp = fopen("info.txt", "r"); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>サークルサイト</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body>
        <?php include('navbar.php'); ?>
        <main role="main" class="container" style="padding:60px 15px 0">
            <div>
                <!-- ここから本文 -->
                <h1>サークルサイト</h1>
                <?php
                    if ($fp){
                        // ファイルが正しく開けたとき
                        $title = fgets($fp); // ファイルから1行読込む
                        if ($title){
                            // 1行読込めたときはタイトル文字列をリンクにする
                            echo '<p><a href="info.php">'.$title.'</a></p>';
                        }else{
                            // ファイルの中身が空だった時
                            echo '<p>お知らせはありません。</p>';
                        }
                    }else{
                        // ファイルが開けなかったとき
                        echo '<p>お知らせはありません。</p>';
                    }
                ?>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script>windows.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"<\/script>')</script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>