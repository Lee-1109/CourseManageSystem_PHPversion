<?php
$studentID=$_GET['studentID'];
$courseID=$_GET['courseID'];
$grade=(int)($_GET['grade']);
require_once ("../../dao/GradeDAO.php");
$gradeDao=new GradeDAO();
$result=$gradeDao->teacherAddGrade($courseID,$studentID,$grade);
if(false!==$result){
    echo "success";
}else{
    echo "error";
}
