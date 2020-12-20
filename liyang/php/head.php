<?php
//获取用户类型
require_once("../../dao/LoginDAO.php");
echo "<div class='head'>";
if(isset($_COOKIE['nowUserID'])){//用户已经登陆
    $login=new LoginDAO();
    $one=$login->getUserDetailById($_COOKIE['nowUserID']);
    switch ($one->type){
        case 0: echo <<<OUT
             <h4>
             学生:<a href="../ManageUserDetail.php"><img src='#'  alt="头像"/></a>$one->tureName($one->userID)
             </h4>
OUT;
        break;
        case 1:echo <<<OUT
            <h4>
            教师:<a href="../ManageUserDetail.php"><img src='#' alt="头像"/></a> $one->tureName($one->userID)
            </h4>
OUT;
        break;
        case 2:echo <<<OUT
            <h4>
            管理员:<a href="../ManageUserDetail.php"><img src='#' alt="头像"/></a> $one->tureName($one->userID)
            </h4>
OUT;
            break;
        default:die("系统数据出错");
    }
    echo "<a href='/login.html'>[注销登陆]</a><hr>";

}else{
    echo "<h2>尚未登陆</h2><a href='/login.html'>去登陆</a>";
}
echo "</div>";