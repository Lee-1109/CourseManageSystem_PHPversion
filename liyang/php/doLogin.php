<?php
/**
 *接收由login.html发来的登陆请求
 */
require_once("../dao/UserDAO.php");
require_once("../dao/LoginDAO.php");
if(isset($_POST['login'])&&$_POST['login']=='登陆'){
    $name=$_POST['userName'];
    $password=$_POST['userPassword'];
    $type=$_POST['type'];
    $mySqlDao=new UserDAO();
    if(false!=$mySqlDao->validate($name,$password,$type)){
        $loginDao=new LoginDAO();
        $user=$loginDao->getUserDetailById($name);
        //将用户信息存入cookie
        setcookie("nowUserID",$name);
        foreach($user as $one){
            setcookie("nowUserName",$user->tureName);
            setcookie("nowUserType",$user->type);
        }
        //跳转到主页
        switch ($type){
            case 0:
                header("Location:StudentSystem/studentMain.php");
                break;
            case 1:
                header("Location:TeacherSystem/teacherMain.php");
                break;
            default :
                header("Location:AdministratorSystem/administratorMain.php");
        }
    }else{
        echo "error";
    }
}
