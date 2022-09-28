<?php
$fp = fopen("./newFile.txt","w");
echo fwrite($fp,"First line");