<?php
$userInput=$_POST['input'];
$handle=fopen("D:\\hello.txt","w");
$num=file_put_contents($handle,$userInput);
echo $num;