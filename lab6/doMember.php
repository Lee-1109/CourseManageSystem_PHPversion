<?php
require_once("../dao/UserDAO.php");
if($_COOKIE['userID']){
    $id=$_COOKIE['userID'];
    $mysqlDao=new UserDAO();
    $connection=$mysqlDao->getConnection();
    if($result=$mysqlDao->findUserDetailById($id)){
        list($ID,$NICKNAME,$USERNAME,$EMAIL,$ADDRESS)=$result;
        echo "id:$ID","昵称:$NICKNAME\n","用户名:$USERNAME\n","电子邮件:$EMAIL\n","地址:$ADDRESS\n";

    }
}
