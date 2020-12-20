<?php
/**
 * 对学院的结构进行管理
 */
require_once ("../../dao/StructDAO.php");
require_once("../../dao/LoginDAO.php");
require_once("../head.php");
echo <<<OUT
<a href="#" onclick="location.href='administratorMain.php'">主页</a>>>>院级组织结构管理
OUT;
$structDao=new StructDAO();
$institute=$structDao->getInstituteName();
?>
<html lang="en">
    <head>
    <title>学院详情</title>
        <script>
            function addDept() {

            }

        </script>
    </head>
    <body>
    <a href="#" onclick="addDept()">添加部门</a>
        <table>
        <tr>
            <td>学院编号</td>
            <td>学院名称</td>
            <td>操作</td>
        </tr>
            <?php
            foreach ($institute as $one){
                echo <<<INS
                <tr>
                <td>$one->instituteID</td>
                <td>$one->instituteName</td>
                <td><a href="instituteStructManage.php?id=$one->instituteID">编辑</a></td>
                </tr>
INS;
            }
            ?>
        </table>
    </body>
</html>

