<?php
require_once ("../../dao/LoginDAO.php");
require_once("../head.php");
echo <<<OUT
<a href="#" onclick="location.href='administratorMain.php'">返回主页</a>>>>教学教室管理
OUT;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>教室管理</title>
    <link href="../../css/doManageUserDetail.css" type="text/css" rel="stylesheet"/>
    <script src="../../js/checkUpdate.js" type="text/javascript" rel="script"></script>
</head>
<body>
    <h5>教室详细信息</h5>
    <hr>
    <ul>
        <li><a href="#">添加教室</a></li>
        <li><a href="#">查询教室</a></li>
    </ul>
    <div class="form">
        <table>
            <tr class="tableRow">
                <td>教室名</td>
                <td>教室容量</td>
                <td>楼管员</td>
            </tr>
            <tr>
            <?php
            /**
             * 管理员管理课程系统
             * DB view_course
             */
            require_once("../../dao/RoomDAO.php");
            $roomDao = new RoomDAO();
            $rooms = $roomDao->queryAllRoomDetail();
            if(false!=$rooms){
                foreach($rooms as $room){
                    echo "<tr class='tableRow'>";
                    echo "<td>$room->教室名</td>";
                    echo "<td>$room->教室容量</td>";
                    echo "<td>$room->楼管员</td>";
                    echo "<td><a href=\"#\" class=\"courseClass_a\">修改</a></td>";
                    echo "</tr>";
                }
            }
            ?>
            </tr>
        </table>
    </div>
</body>
</html>

