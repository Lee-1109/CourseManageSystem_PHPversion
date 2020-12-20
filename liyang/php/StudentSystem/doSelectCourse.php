<?php
/**
 * 执行选课操作 使用Ajax 根据返回结果来无刷新
 */
require_once ("../../dao/CourseDAO.php");
$courseID=$_GET['courseID'];//将选课的课程
$studentID=$_COOKIE['nowUserID'];//选课的学生
$courseDao=new CourseDAO();
if(false!=($courseDao->studentSelectOptionalCourse($courseID,$studentID))){
    echo "success";
    header("Location:selectCourse.php");//跳转到选课界面
}else{
    echo "error";
}