<?php
require_once("../dao/StudentDAO.php");
//头信息的设置 告诉浏览器返回数据的格式
header('Content-Type: application/json');
$studentDao = new StudentDAO();
$insID=$_GET['insID'];//获取学院号
$students = $studentDao->queryStudentDetailByInsID($insID);
if (false != $students) {
    $studentArray=array();
    $i=0;
    foreach ($students as $student) {
        //给定JSON数组形式
        $page=(int)($i/10)+1;
        //$str=json_encode($student);
        $str= '{"class":"'.$student->classID.'","studentID":"'.$student->studentID.'","name":"'.$student->studentName.'","sex":'.$student->gender.',"age":'.$student->age.',"email":"'.$student->email.'"}';
        array_push($studentArray,$str);
        $i++;
    }
    print_r($studentArray);
}else{
    echo  "error";
}