<?php
require_once("../../dao/CourseDAO.php");
$courseDao=new CourseDAO();
if(isset($_POST['updateCourse']) && $_POST['updateCourse']=="更新"){
    $id=$_POST['newID'];
    $name=$_POST['newName'];
    $credit=$_POST['newCredit'];
    $time=$_POST['newTime'];
    $term=$_POST['newCourseTerm'];
    $type=$_POST['newCourseType'];
    if($courseDao->update($id,$name,$credit,$time)){
        echo "修改成功，1秒后返回预览页";
        echo "点我立即跳转<a href='administratorCourse.php'>点我立即跳转</a>";
        header("Refresh:1;url:administratorCourse.php");
    }else{
        echo "修改课程失败，请检查输入信息,本页面将自动跳转";
        header("Location:administratorCourse.php");
    }
}