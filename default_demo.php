<!-- default_demo関数の利用 -->
<?php
    function default_demo($name = "太郎"){
        echo "私の名前は" . $name . "です";
    }
    default_demo("花子"); // 引数あり
    default_demo(); // 引数なし
?>