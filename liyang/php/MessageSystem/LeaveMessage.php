<?php

require_once("../../dao/MessageDAO.php");
require_once ("../../dao/LoginDAO.php");
$messageDao=new MessageDAO();
$loginDao=new LoginDAO();
$idArray=$loginDao->getUserIdAndName();
if(isset($_POST['submit'])&& $_POST['submit']=='send'){
    $nowUserID=$_COOKIE['nowUserID'];
    $toID=$_POST['to_id'];
    $title=$_POST['title'];
    $message=$_POST['messageArea'];
    if($messageDao->save($nowUserID,$toID,$title,$message)){
        echo "留言已发出";
    }
    else
        echo "留言失败";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言系统</title>
    <script src="../../js/util.js" rel="script" type="text/javascript"></script>
</head>
<body>
<div>
    <button onclick="back();">返回首页</button>
    <form method="post">
        <label>标题
            <input type="text" name="title" size="50"/><br>
        </label>
        <label>正文<br>
            <textarea name="messageArea" cols="50" rows="30" maxlength="100" placeholder="请输入留言信息"></textarea>
        </label><br>
        <label for="to_who">接收方:</label>
        <select id="to_who" name="to_id" >
        <?php
            foreach($idArray as $user){
                echo " <option value=\"$user->userID\">$user->tureName</option>";
        }
        ?>
    </select>
        <input type="submit" id="messageSubmit" name="submit" value="send" onclick="confirm_leaveMessage()"/>
    </form>
</div>
</body>
</html>
