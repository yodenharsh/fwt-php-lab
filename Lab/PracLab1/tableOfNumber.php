<?php
function table($a){
    for($i = 1;$i<=10;$i++){
        echo "$a * $i = ",$i*$a,"<br>";
    }
}
table(4);
?>