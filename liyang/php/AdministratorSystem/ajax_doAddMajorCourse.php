<?php
/**
 * 进行专业选课
 */
if(isset($_GET['courseID'])&& isset($_GET['majorID']) && isset($_GET['teacherID'])){
    $courseID=$_GET['courseID'];
    $majorID=$_GET['majorID'];
    $teacherID=$_GET['teacherID'];
    require_once ("../../dao/CourseDAO.php");
    $courseDao=new CourseDAO();
    $result=$courseDao->addMajorCourse($courseID,$majorID,$teacherID);
    if($result) echo "success";
    else echo "error";
}else{
    echo "error";
}
