<?php
require_once ("../dao/LoginDAO.php");
$loginDao=new LoginDAO();
if(isset($_POST['id'])&&isset($_POST['newpassword'])){
    $userID=$_POST['id'];
    $userPassword=$_POST['password'];
    $tureName=$_POST['tureName'];
    $email=$_POST['email'];
    $result=$loginDao->update($userID,$userPassword,$tureName,$email);
    if($result!==false) echo "success";
    else echo "error";
}



