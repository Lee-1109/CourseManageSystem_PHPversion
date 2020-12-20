<?php
require_once("../dao/GradeDAO.php");
header('Content-Type: application/json');
$studentID=$_COOKIE['nowUserID'];

if(isset($_GET['trm'])){
    $term=$_GET['trm'];
}else{
    $term=0;
}
$gradeDao = new GradeDAO();
$result =$gradeDao->studentGetOwnGrade($studentID,$term);
if (false !== $result && count($result)!==0) {
    $jsonArray=array();
    $i=0;
    foreach ($result as $grade) {
        //给定JSON数组形式
        $te=json_encode($grade);
        array_push($jsonArray,$te);
        $i++;
    }
    print_r($jsonArray);
}else{
    echo  "error";
}
