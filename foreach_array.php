<!-- foreach構文で通常の配列を操作 -->
<pre>
<?php
    $numbers = array(2, 4, 6);
    foreach($numbers as $key => $value){
        $numbers[$key] = $value * 10; // 10倍して元の配列要素に代入
    }
    var_dump($numbers); // データ確認
?>
</pre>