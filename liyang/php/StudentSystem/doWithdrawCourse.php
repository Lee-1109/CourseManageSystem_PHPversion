<?php
/**
 * 退选课程
 */

require_once ("../../dao/CourseDAO.php");
$courseID=$_GET['courseID'];//将选课的课程
$studentID=$_COOKIE['nowUserID'];//选课的学生
$courseDao=new CourseDAO();
if(false!=($courseDao->studentWithDrawOptionalCourse($courseID,$studentID))){
    echo "success";
    header("Location:selectCourse.php");//跳转到选课界面
}else{
    echo "error";
}
