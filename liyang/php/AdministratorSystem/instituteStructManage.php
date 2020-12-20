<?php
require_once ("../../dao/StructDAO.php");
require_once("../../dao/LoginDAO.php");
require_once("../head.php");
echo <<<OUT
    <a href="#" onclick="location.href='administratorMain.php'">主页</a>>>>
    <a href="#" onclick="location.href='administratorStruct.php'">院级组织结构管理</a>>>>行政班级管理
OUT;
if(isset($_GET['id'])){
    $insID=$_GET['id'];//获取管理的组织部门编号
    $insStruct=new StructDAO();
    $result=$insStruct->getInsStructByInsId($insID);
    echo <<<TABLE
<hr><a href="#">添加班级</a>
    <table>
        <tr>
         <td>学院编号</td>
         <td>学院名称</td>
         <td>专业编号</td>
         <td>专业名称</td>
         <td>班级</td>
         <td>操作</td>
        </tr>
TABLE;
    if(false!==$result){
        foreach ($result as $one){
            echo <<<ONE
            <tr>
                <td>$one->insID</td>
                <td>$one->insName</td>
                <td>$one->majorID</td>
                <td>$one->majorName</td>
                <td>$one->classID</td>
                <td><a href="#">变更</a></td>
                <td><a href="#">删除</a></td>
            </tr>

ONE;
        }
    }
   echo "</table>";
}else{
    echo "出错了";
}


