<?php
$fp = fopen("newFile.txt","r");
echo fread($fp,filesize("newFile.txt"));
fclose($fp);