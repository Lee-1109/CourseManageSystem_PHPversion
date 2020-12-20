<?php
require_once("../dao/CourseDAO.php");
//头信息的设置 告诉浏览器返回数据的格式JSON格式
header('Content-Type: application/json');
$courseDao = new CourseDAO();
//获取学院号
$insID=$_GET['insID'];
//获取请求页码
$page=$_GET['page'];
$students = $courseDao->getCourseByInsID($insID);
if (false!==$students) {
    $courseArray=array();
    $i=1;
    foreach ($courseArray as $course) {
        //给定JSON数组形式
        $page=(int)($i/10)+1;
        $str= "page=$page".'{"courseID":"'.$course->corseID.'","majorID":"'.$course->majorID.'","teacherID":"'.$course->teacherID.'"}';
        array_push($studentArray,$str);
        $i++;
    }
    print_r($courseArray);
}else{
    echo  "error";
}