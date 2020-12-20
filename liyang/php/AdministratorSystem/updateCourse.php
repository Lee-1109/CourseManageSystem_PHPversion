<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程修改页面</title>
    <script src="../../js/doCourseUpdate.js" type="text/javascript" rel="script"></script>
    <script src="../../js/security/confirmAdmini.js" type="text/javascript" rel="script"></script>
</head>
<body>
<div class="form">
    <form action="doUpdateCourse.php" method="post" onsubmit="return doConfirm()">
        <!--应当添加课程号重复查询-->
        <?php
        $id=$_GET['id'];
        $name=$_GET['name'];
        $credit=$_GET['credit'];
        $time=$_GET['time'];
        $term=$_GET['term'];
        $type=$_GET['type'];
        ?>
        <label class="text">课程号</label>
        <label><input type="text"  name="newID"  size="20" value="<?php echo $id; ?>" readonly="true" /></label><br>
        <label class="text">课程名</label>
        <label><input type="text" name="newName" size="20" value="<?php echo $name; ?>" /></label><br>
        <!--学分-->
        <label class="text">课程学分</label>
        <label><input class="text" name="newCredit" value="<?php echo $credit; ?>"/></label><br>
        <!--学时-->
        <label class="text">课程学时</label>
        <label><input type="text"  name="newTime" size="20" value="<?php echo $time ?>"/></label>
        <span id="emailSpan" class="span"></span><br>
        <label>上课学期
            <select class="text" name="newCourseTerm">
                <option value="<?php echo $term; ?>">第 <?php echo $term ?> 学期</option>
                <?php
                for($i=1;$i<9;$i++){
                    echo "<option value=\"$i\">第 $i  学期</option>";
                }
                ?>
            </select>
        </label><br>
        <!--课程类型选择-->
        <label>课程类型
            <select class="text" name="newCourseType">
                <option value="<?php echo $type ?>"><?php if($type==0) echo "必修"; else echo "选修";?></option>
                <option value="0">必修</option>
                <option value="1">选修</option>
            </select>
        </label><br>
        <!--提交按钮-->
        <input type="submit" name="updateCourse" value="更新" size="10"/>
    </form>
</div>
</body>
</html>

