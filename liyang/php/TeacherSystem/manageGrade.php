<?php require_once("../head.php");
echo <<<OUT
<a href="#" onclick="location.href='teacherMain.php'">返回主页</a>>>>任教课程成绩管理
OUT;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>任教课程成绩管理</title>
    <script src="../../js/checkUpdate.js" type="text/javascript" rel="script"></script>
</head>
<body>
<hr>
<div class="form">
    <h4>未录入课程</h4><hr>
    <table>
        <tr class="tableRow">
            <td>课程号</td>
            <td>任教课程名</td>
            <td colspan="2">操作</td>
        </tr>
        <?php
        require_once("../../dao/CourseDAO.php");
        $courseDao = new CourseDAO();
        $result = $courseDao->queryTeacherCourseGrade($_COOKIE['nowUserID'],0);
        if(false!==$result){
            foreach ($result as $one) {
                echo "<tr class='tableRow'>";
                echo "<td>$one->courseID</td>";
                echo "<td>$one->courseName</td>";
                echo "<td><a href=\"teacherAddGrade.php?courseID=$one->courseID&name=$one->courseName\">录入</a></td>";
                echo "</tr>";
            }
        }else{
            echo "<tr><td>暂无课程</td></tr>";
        }

        ?>
    </table>
    <hr><h4>已录入课程</h4><hr>
    <table>
        <tr class="tableRow">
            <td>课程号</td>
            <td>任教课程名</td>
            <td colspan="2">操作</td>
        </tr>
        <?php
        $result = $courseDao->queryTeacherCourseGrade($_COOKIE['nowUserID'],1);
        if(false!==$result){
            foreach ($result as $one) {
                echo "<tr class='tableRow'>";
                echo "<td>$one->courseID</td>";
                echo "<td>$one->courseName</td>";
                echo "<td><a href=\"teacherModifyGrade.php?courseID=$one->courseID&name=$one->courseName\">修改</a></td>";
                echo "</tr>";
            }
        }else{
            echo "<tr><td>暂无课程</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>