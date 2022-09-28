<?php
$fp = fopen("newFile.txt","a");
fwrite($fp,"\nAnother Line");
echo fread($fp,filesize("newFile.txt")); 