<?php
require_once ("../../dao/LoginDAO.php");
require_once("../head.php");
echo <<<OUT
<a href="#" onclick="location.href='administratorMain.php'">返回主页</a>>>>开设课程管理
OUT;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理课程信息</title>
    <script src="../../js/checkUpdate.js" type="text/javascript" rel="script"></script>
    <script src="../../js/AjaxMain/BaseAjaxUtil.js" type="text/javascript" rel="script"></script>
    <script>
        function run(id){
            XMLHttp=getXMLHttpRequestObject();
            //编写请求处理的URL
            let url="ajax_doDeleteCourse.php?id="+id;
            XMLHttp.open("GET",url,true);
            XMLHttp.send();//发送请求串 GET方法发送空
            XMLHttp.onreadystatechange=function (){//定义相应处理函数
                if(XMLHttp.readyState===4 && XMLHttp.status===200){
                    if(XMLHttp.responseText!=='error')
                        alert("删除成功");
                    else
                        alert("删除失败");
                }
            }
        }

    </script>
</head>
<body>
<h5>课程详细信息</h5>
<hr>
    <ul>
        <li><a href="addCourse.php">添加课程</a></li>
        <li><a href="majorCourse.php">任教管理</a></li>
    </ul>
<!--条件查询框-->
<?php
//require_once ("../../dao/StructDAO.php");
//require_once("../conditionIns.php");?>
<!--表格框-->
    <div class="form">
        <table>
            <tr class="tableRow">
                <td>课程号</td>
                <td>课程名称</td>
                <td>学分</td>
                <td>学时</td>
                <td>开设学期</td>
                <td>开始周</td>
                <td>结束周</td>
                <td>已开设该课程部门数</td>
                <td colspan="2">操作</td>
            </tr>
            <?php
            require_once("../../dao/CourseDAO.php");
            $courseDao=new CourseDAO();
            $courses=$courseDao->getAllCourse();
            foreach($courses as $course){
//                switch ($course->courseType){
//                    case 0:echo "<td>必修</td>";
//                            break;
//                    default:echo "<td>选修</td>";
//                }
                $count=$courseDao->getBeginCourseCount($course->courseID);
                echo<<<OUT
                    <tr>
                    <td>$course->courseID</td>
                    <td>$course->courseName</td>
                    <td>$course->credit</td>
                    <td>$course->coursePeriod</td>
                    <td>$course->term</td>
                    <td>$course->beginWeek</td>
                    <td>$course->endWeek</td>
                    <td>$count</td>
                    <td><a href="updateCourse.php?id=$course->courseID&name=$course->courseName&credit=$course->credit&time=$course->coursePeriod&term=$course->term&type=$course->courseType">修改</a></td>
                    <td><a href="" onclick="run($course->courseID)">删除</a></td>
                    </tr>
OUT;
            }
            ?>
        </table>
    </div>
</body>
</html>

