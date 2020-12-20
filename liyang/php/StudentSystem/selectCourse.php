<?php require_once("../head.php");
echo <<<OUT
<a href="#" onclick="location.href='studentMain.php'">返回主页</a>>>>学生选课系统
OUT;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生选课中心</title>
    <script src="../../js/util.js" type="text/javascript" rel="script"></script>
    <script src= "../../js/BaseJs/Confirm.js" type="text/javascript" rel="script"></script>
</head>
<body>
<div class="login">
    <table>
        <tr>
            <td>课程编号</td>
            <td>课程名称</td>
            <td>学分</td>
            <td>学时</td>
            <td>上课学期</td>
            <td>课程性质</td>
            <td>操作</td>
        </tr>
        <?php
        require_once ("../../dao/CourseDAO.php");
        $courseDao=new CourseDAO();
        $notSelectedCourse=$courseDao->studentGetNotSelectedOptionalCourse($_COOKIE['nowUserID']);
        $selectedCourse=$courseDao->studentGetSelectedOptionalCourse($_COOKIE['nowUserID']);
        echo"<hr>未选课程<hr>";
        if(false!=$notSelectedCourse){
            foreach ($notSelectedCourse as $one){
                echo "<tr>";
                echo "<td>$one->courseID</td>";
                echo "<td>$one->courseName</td>";
                echo "<td>$one->credit</td>";
                echo "<td>$one->coursePeriod</td>";
                echo "<td>$one->term</td>";
                echo "<td>$one->courseType</td>";
                echo "<td><a id='select' href='doSelectCourse.php?courseID=$one->courseID' onclick='return runSelect()'>选课</a></td>";
                echo "</tr>";
            }
        }else{
            echo "<tr>";
            echo "<td>暂无未选课程</td>";
            echo "</tr>";
        }

        ?>
        </table>
        <table>
        <tr>
            <td>课程编号</td>
            <td>课程名称</td>
            <td>学分</td>
            <td>学时</td>
            <td>上课学期</td>
            <td>课程性质</td>
            <td>操作</td>
        </tr>
        <?php
        echo"<hr>已选课程<hr>";
        if(false!==$selectedCourse){
            foreach ($selectedCourse as $selected){
                echo "<tr>";
                echo "<td>$selected->courseID</td>";
                echo "<td>$selected->courseName</td>";
                echo "<td>$selected->credit</td>";
                echo "<td>$selected->coursePeriod</td>";
                echo "<td>$selected->term</td>";
                echo "<td>$selected->courseType</td>";
                echo "<td><a  href='doWithdrawCourse.php?courseID=$selected->courseID'  onclick=' return runWithDraw()'>退选</a></td>";
                echo "</tr>";
            }
        }else{
            echo "<tr>";
            echo "<td>暂无已选课程</td>";
            echo "</tr>";
        }

        ?>
        </table>
</div>
</body>
</html>

