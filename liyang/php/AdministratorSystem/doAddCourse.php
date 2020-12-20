<?php
/**
 * 添加课程
 */

require_once("../../dao/CourseDAO.php");
require_once("../../dao/TeacherDAO.php");
require_once("../../dao/RoomDAO.php");
require_once("../../dao/LoginDAO.php");
require_once("../head.php");

/*当添加课程请求发出时 执行此操作*/
if(isset($_POST['addCourse']) && $_POST['addCourse']=="添加课程"){
    $courseDao=new CourseDAO();
    $id=$_POST['courseID'];
    $name=$_POST['courseName'];
    $credit=$_POST['courseCredit'];
    $time=$_POST['coursePeriod'];
    $term=$_POST['courseTerm'];
    $type=$_POST['courseType'];
    $begin=$_POST['begin'];
    $end=$_POST['end'];
    if($courseDao->add($id,$name,$credit,$time,$term,$type,$begin,$end)){
        echo "添加课程成功5秒后自动跳转课程查看页";
        header("Refresh:5;url:../../html/administratorCourse.html");
    }else{
        echo "添加课程失败，请检查输入信息,本页面将自动跳转";
        header("Refresh:1;url:../php/doCourseAdd");
    }
}



