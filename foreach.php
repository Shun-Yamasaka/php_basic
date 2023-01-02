<!-- foreach構文で連想配列の値を出力 -->
<?php
    $results = array(
        "math" => 90,
        "english" => 80,
        "japanese" => 85
    );
    foreach($results as $score){
        echo $score . "<br>";
    }
?>