<?php
header('content-type:text/html;charset=utf-8');
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    echo $name;
    file_put_contents("D:/hello.txt",$name);
}
$file=file("D:/hello.txt");
echo $file;

