<?php
require_once ("../../dao/LoginDAO.php");
require_once("../head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员首页</title>
</head>
<body>
<div class="container">
    <ul>
        <li><a href="administratorStruct.php">部门组织管理</a></li>
        <li><a href="administratorStudent.php">学生信息管理</a></li>
        <li><a href="administratorTeacher.php">教师信息管理</a></li>
        <li><a href="administratorCourse.php">课程信息管理</a></li>
        <li><a href="administratorRoom.php">教室信息管理</a></li>
        <li><a href="../MessageSystem/messageSystemMain.php">留言系统</a></li>
        <li><a href="#">公告发布</a></li>
    </ul>
</div>
</body>
</html>