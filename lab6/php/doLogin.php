<?php
require("../dao/MySqlDAO.php");
require("../vo/User.php");
if (isset($_POST['submit']) &&$_POST['submit']=='load'){
    $name=$_POST['userName'];
    $password=$_POST['userPassword'];
    $mySqlDao=new UserDAO();
    if(FALSE == $mySqlDao->getConnection()){
        echo "$name,数据库连接异常，请稍后重试";
    }
    if(FALSE!=$mySqlDao->validate($name,$password)){
        setcookie("userID",$name);
        header("Location:doMember.php");
    }else{
        echo "未找到您输入的账号信息";

    }
}