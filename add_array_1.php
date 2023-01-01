<!-- 配列に値を追加する -->
<pre>
<?php
    // 配列の作成、$friends[0]～[2]ができる
    $friends = array("はるき", "かおる", "ひでと");
    $friends[] = "まさとし"; // $friends[3]に作成・代入する
    var_dump($friends); // 中身を確認
?>
</pre>