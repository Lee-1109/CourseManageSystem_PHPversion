<html>
<head>
    <title>验证身份证号合法性</title>
</head>
<body>
<form action="" method="post">
    请输入身份证号：<input type="text" name="id"><br>
    <input type="submit" name="submit" value="验证">
</form>
</body>
</html>

<?php
function checkID ($id){
    $id_pattern = "/^(\d{6})(18|19|20)?(\d{2})([01]\d)([0123]\d)(\d{3})(\d|X)?$/";
    if (preg_match($id_pattern,$id) == 1) {
        $result = $id."是合法的身份证号码.<br>";
    } else if (preg_match($id_pattern,$id) == 0) {
        $result = $id."不是合法的身份证号码.<br>";
    }
    echo $result;
}
if(isset($_POST['submit']))
{
    $ID=$_POST['id'];
    checkID($ID);
}
