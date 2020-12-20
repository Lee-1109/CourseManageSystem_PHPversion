<?php
require_once("../../dao/GradeDAO.php");
require_once ("../../dao/CourseDAO.php");
require_once ("../../dao/StudentDAO.php");
require_once("../head.php");
$gradeDao = new GradeDAO();
$courseDao= new CourseDAO();
$studentDao=new StudentDAO();
$courseID = $_GET['courseID'];
$courseName = $_GET['name'];
echo <<<OUT
<a href="#" onclick="location.href='teacherMain.php'">返回主页</a>>>>成绩信息录入
<h5>课程号：$courseID</h5>
<h5>课程名：$courseName</h5><hr>
OUT;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程成绩录入</title>
    <script src="../../js/checkUpdate.js" type="text/javascript" rel="script"></script>
    <script src="../../js/AjaxMain/BaseAjaxUtil.js" type="text/javascript" rel="script"></script>
    <script>
        function runAdd(studentID){
            //Ajax进行成绩的添加
            XMLHttp=getXMLHttpRequestObject();
            let courseID=document.getElementById("course").value;//获取课程号
            let studentGrade=document.getElementById("g"+studentID).value;//获取成绩
            alert("\n【成绩添加提醒】\n学号:"+studentID+"\n成绩:"+studentGrade);
            //编写请求处理的URL
            let url="ajax_doAddGrade.php?studentID="+studentID+"&courseID="+courseID+"&grade="+studentGrade;
            XMLHttp.open("GET",url,true);
            XMLHttp.send();//发送请求串 GET方法发送空
            XMLHttp.onreadystatechange=function (){//定义相应处理函数
                if(XMLHttp.readyState===4 && XMLHttp.status===200){
                    if(XMLHttp.responseText!=='error')
                        alert("保存成功");
                    else
                        alert("保存失败");
                }
            }
        }

    </script>
</head>
<body>
<!--用来获取课程号-->
<input type="hidden" id="course" value="<?php echo $courseID ?>"/>
<h2>提示：你只能提交一次，如果需要修改成绩请联系相应权限管理员删库跑路</h2>
<table>
    <tr>
        <td>学号</td>
        <td>姓名</td>
        <td>成绩</td>
    </tr>
    <?php
    $result = $studentDao->getStudentIdAndNameByCourse($courseID);
    //修改成绩
    if($result==false){
        echo "出错请联系管理员";
    }else{
        foreach ($result as $one) {
            echo <<<OUT
                    <tr>
                        <td>$one->studentID</td>
                        <td>$one->studentName</td>
                        <td><input id="g$one->studentID" type="text"/></td>
                        <td><a href="#" onclick="runAdd($one->studentID)">提交</a></td>
                    </tr>
OUT;
        }
    }

    ?>
</table>
</body>
</html>
