<?php
require_once("../head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程添加页面</title>

</head>
<body>
<div class="form">
    <form action="doAddCourse.php" method="post">
        <!--应当添加课程号重复查询-->
        <label class="text">课程号</label>
        <label><input type="text" name="courseID" size="20" /></label><br>
        <label class="text">课程名</label>
        <label><input type="text" name="courseName" size="20" /></label><br>
        <!--学分-->
        <label class="text">课程学分</label>
        <label onblur="setCourseTime()">
            <select id="courseCredit" name="courseCredit">
                <?php
                $i=0;
                while($i<10){
                    echo "<option value=\"$i\">$i</option>";
                    $i++;
                }
                ?>
            </select>
        </label><br>
        <!--学时-->
        <label class="text">课程学时</label>
        <label>
            <select id="coursePeriod" name="coursePeriod">
                <?php
                $i=0;
                while($i<90){
                    echo "<option value=\"$i\">$i</option>";
                    $i+=8;
                }
                ?>
            </select><br>
        </label>
        <!--上课学期安排-->
        <label>上课学期
            <select class="text" name="courseTerm">
                <option value="-1">请选择</option>
                <?php
                for($i=1;$i<9;$i++){
                    echo "<option value=\"$i\">第 $i 学期</option>";
                }
                ?>
            </select>
        </label><br>
        <!--课程类型选择-->
        <label>课程类型
            <select class="text" name="courseType">
                <option value="-1">请选择</option>
                <option value="0">必修</option>
                <option value="1">选修</option>
            </select>
        </label><br>
        <label>开始周数:
            <select class="text" name="begin">
                <option value="-1">请选择</option>
                <?php
                for($i=1;$i<20;$i++){
                    echo "<option value=\"$i\">第 $i 周</option>";
                }
                ?>
            </select>
        </label><br>
        <label>结束周数:
            <select class="text" name="end">
                <option value="-1">请选择</option>
                <?php
                for($i=1;$i<20;$i++){
                    echo "<option value=\"$i\">第 $i 周</option>";
                }
                ?>
            </select>
        </label><br>
        <!--提交按钮-->
        <input type="submit" name="addCourse" value="添加课程" size="10"/>
    </form>
</div>
</body>
</html>