<html>
<head>
    <title>截取字符串</title>
</head>
<body>
<form action="" method="post">
    输入字符串：<input type="text" name="string"><br>
    从<input type="text" name="start">开始截取<input type="text" name="length">位。
    <input type="submit" name="submit" value="截取">
</form>
</body>
</html>
<?php
header('content-type:text/html;charset=utf-8');//指定字符集，避免因为浏览器的默认字符导致的乱码
function substr_utf8($str,$start,$length = null){
    return join("",array_splice(preg_split("//u",$str,-1,PREG_SPLIT_NO_EMPTY),$start,$length));
}
if(isset($_POST['submit']))
{
    $start=0;
    $length=0;
    $string=$_POST['string'];
    $start=$_POST['start'];
    $length=$_POST['length'];
    echo substr_utf8($string,$start,$length);
}

