<!-- foreach構文で連想配列のキーと値を出力 -->
<?php
    $results = array(
        "math" => 90,
        "english" => 80,
        "japanese" => 85
    );
    foreach($results as $title => $score){
        echo $title . ":" . $score . "<br>";
    }
?>