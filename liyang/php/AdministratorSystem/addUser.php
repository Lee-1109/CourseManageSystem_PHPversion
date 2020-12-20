<?php
require_once("../dao/UserDAO.php");
$id=$_POST['register_id'];
$password=$_POST['register_password']==null?"hello":$_POST['register_password'];
$nickName=$_POST['nickName']==null?"hello":$_POST['nickName'];
$trueName=$_POST['userTrueName']==null?"hello":$_POST['userTrueName'];
$email=$_POST['email']==null?"hello":$_POST['email'];
$address=$_POST['address']==null?"hello":$_POST['address'];

if(isset($_POST['register']) && $_POST['register']=='register'){
    $mySqlDao=new UserDAO();
    $mySqlDao->getConnection();
    if($mySqlDao->register($id,$password,$nickName,$trueName,$email,$address)){
        echo "注册成功";
    }else{
        echo "注册失败，用户名已经存在";
    }
}
