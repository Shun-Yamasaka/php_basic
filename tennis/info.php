<?php
    $fp = fopen("info.txt", "r"); // ファイルオープン
    $line = array(); // ファイル内容を1行ずつ要素に格納するための配列を用意
    $body = ''; // 本文を格納するための変数
    // ファイルが正しく開けたとき
    if ($fp){
        // ファイルポインタがファイルの終端に達するまでループ
        while(!feof($fp)){
            $line[] = fgets($fp);
        }
        fclose($fp);
    }
?>
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
                <h1>お知らせ</h1>
                <?php
                    // お知らせがあるとき（要素数が1以上の時）
                    if(count($line) > 0){
                        // ファイル内容を1行ずつ処理
                        for($i = 0; $i < count($line); $i++){
                            if($i == 0){
                                // 1行目（=0番目の要素）はタイトル
                                echo '<h2>'.$line[0].'</h2>';
                            } else{
                                // $i行目に改行タグを付けて本文変数に代入
                                $body .= $line[$i] .'<br>';
                            }
                        }
                    }else{
                        $body = 'お知らせはありません。';
                    }
                    echo '<p>'.$body.'</p>';
                ?>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script>windows.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"<\/script>')</script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>