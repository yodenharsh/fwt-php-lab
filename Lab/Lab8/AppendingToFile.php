<?php
$fp = fopen("newFile.txt","a");
echo fwrite($fp,"\nAnother Line");