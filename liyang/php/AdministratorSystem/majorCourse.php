<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>任教课程管理</title>
        <script src="../../js/AjaxMain/BaseAjaxUtil.js" type="text/javascript" rel="script"></script>
        <script>
            function runAdd(courseID){
                //Ajax进行专业选课
                let XMLHttp=getXMLHttpRequestObject();
                let teacherID=document.getElementById("s"+courseID).value;//获取课程号
                let majorID=document.getElementById("m"+courseID).value;//获取上课专业
                //编写请求处理的URL
                let url="ajax_doAddMajorCourse.php?courseID="+courseID+"&teacherID="+teacherID+"&majorID="+majorID;
                XMLHttp.open("GET",url,true);
                XMLHttp.send();//发送请求串 GET方法发送空
                XMLHttp.onreadystatechange=function (){//定义相应处理函数
                    if(XMLHttp.readyState===4 && XMLHttp.status===200){
                        if(XMLHttp.responseText!=='error')
                            alert("专业选课成功");
                        else
                            alert("专业选课失败");
                    }
                }
            }
        </script>
    </head>
    <body>
    <table>
        <tr>
            <td>课程号</td>
            <td>课程名称</td>
            <td>学分</td>
            <td>学时</td>
            <td>开设学期</td>
            <td>开始周</td>
            <td>结束周</td>
            <td>上课班级</td>
            <td>任教老师</td>
            <td>操作</td>
        </tr>
        <?php
        require_once("../../dao/CourseDAO.php");
        require_once ("../../dao/TeacherDAO.php");
        require_once ("../../dao/StructDAO.php");
        $classes=new StructDAO();
        $courseDao=new CourseDAO();
        $teacherDao=new TeacherDAO();
        $courses=$courseDao->getAllMajorCourse();
        $teacherArray=$teacherDao->getAllTeacherIdAndName();
        foreach($courses as $course){
            echo<<<OUT
                    <tr>
                    <td>$course->courseID</td>
                    <td>$course->courseName</td>
                    <td>$course->credit</td>
                    <td>$course->coursePeriod</td>
                    <td>$course->term</td>
                    <td>$course->beginWeek</td>
                    <td>$course->endWeek</td>  
                    <td>                      
OUT;
            //上课班级
            echo <<<OUT
            <select  id="m$course->courseID">
            <option>请选择</option>
OUT;
            if(false!==$classes->getInsMajorClassName()){
                $insArray=$classes->getInsMajorClassName();
                foreach($insArray as $class){
                    $classID=$class->classID;
                    echo "<option value=\"$class->majorID\">$class->insName $class->majorName</option>";
                }
            }
            echo "</select>";
            //上课教师
            if(false!==$teacherDao->getAllTeacherIdAndName()){
                echo<<<OUT
                        </td> 
                     <td>
                   <select id="s$course->courseID">
                   <option>请选择</option>   
OUT;
                foreach($teacherArray as $one){
                    echo<<<OUT
                    <option value="$one->teacherID">$one->instituteName  $one->teacherID  $one->teacherName </option>        
OUT;
                }//输出教师的信息
            }
            echo<<<OUT
                    </select>
                    </td>
                        <td><a href="#" onclick="runAdd($course->courseID)">确认</a></td></tr>
OUT;
        }

        ?>
    </table>
    </body>
</html>
