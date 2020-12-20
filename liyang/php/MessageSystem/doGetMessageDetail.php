<?php
$title=$_GET['title'];
$sender=$_GET['sender'];
$time=$_GET['time'];
$message=$_GET['message'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>信息详情</title>
    <script src="../../js/util.js" type="text/javascript" rel="script"></script>
</head>
<body>
<button onclick="back();">返回</button>
<div>
    <h1>标题：<?php echo $title;?></h1>
    <h3>发件人：<?php echo $sender;?></h3>
    <h4>接收时间：<?php echo $time;?></h4>
    <article>详情：<?php echo $message;?></article>
</div>
</body>
</html>