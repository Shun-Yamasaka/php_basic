<!-- if構文をswitch構文に書き換える -->
<?php
    $i = 0;
    if ($i == 0){
        echo "if構文:iは0に等しい<br>";
    } else if($i == 1){
        echo "if構文:iは1に等しい<br>";
    } else {
        echo "if構文:iは0と1どちらでもない<br>";
    }

    switch ($i){
        case 0:
            echo "switch構文:iは0に等しい<br>";
            break;
        case 1:
            echo "switch構文:iは1に等しい<br>";
            break;
        default:
            echo "switch構文:iは0と1どちらでもない<br>";
    }
?>