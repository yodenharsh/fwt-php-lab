<?php
function patter($a){
    for($i = 1;$i<=$a;$i++){
        for($j = $a;$j>=$i;$j--){
            echo "&nbsp";
        }
        for($j = $i;$j>=1;$j--){
            echo "*";
        }
        echo "<br>";
    }
}

patter(5);
?>