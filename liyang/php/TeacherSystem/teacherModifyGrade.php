<?php
require_once("../../dao/GradeDAO.php");
require_once ("../../dao/CourseDAO.php");
require_once("../head.php");
$gradeDao = new GradeDAO();
$courseDao= new CourseDAO();
$courseID = $_GET['courseID'];
$courseName = $_GET['name'];
echo <<<OUT
<a href="#" onclick="location.href='teacherMain.php'">返回主页</a>>>>成绩信息更新
<h5>课程号：$courseID</h5>
<h5>课程名：$courseName</h5><hr>
OUT;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改课程成绩</title>
    <script src="../../js/checkUpdate.js" type="text/javascript" rel="script"></script>
    <script src="../../js/AjaxMain/BaseAjaxUtil.js" type="text/javascript" rel="script"></script>
    <script>
        function runModify(studentID,studentGrade){
            //Ajax进行成绩的更新
            XMLHttp=getXMLHttpRequestObject();
            let courseID=document.getElementById("course").value;//获取课程号
            alert("\n【成绩修改提醒】\n学号:"+studentID+"\n成绩:"+studentGrade);
            //编写请求处理的URL
            let url="ajax_doUpdateGrade.php?studentID="+studentID+"&courseID="+courseID+"&grade="+studentGrade;
            XMLHttp.open("GET",url,true);
            XMLHttp.send();//发送请求串 GET方法发送空
            XMLHttp.onreadystatechange=function (){//定义相应处理函数
                if(XMLHttp.readyState===4 && XMLHttp.status===200){
                    if(XMLHttp.responseText!=='error')
                        alert("更改成功");
                    else
                        alert("更改失败，已过修改期限");
                }
            }
        }

    </script>
</head>
<body>
<!--用来获取课程号-->
<input type="hidden" id="course" value="<?php echo $courseID ?>"/>
    <table>
        <tr>
            <td>学号</td>
            <td>姓名</td>
            <td>成绩</td>
        </tr>
        <?php
        $result = $gradeDao->teacherGetGrade($courseID);
        //修改成绩
            foreach ($result as $one) {
                echo <<<OUT
                    <tr>
                        <td>$one->studentID</td>
                        <td>$one->studentName</td>
                        <td><input value="$one->grade"/></td>
                        <td><a href="#" onclick="runModify($one->studentID,$one->grade)">确认修改</a></td>
                    </tr>
OUT;
            }
        ?>
    </table>
</body>
</html>
