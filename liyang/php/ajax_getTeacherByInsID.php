<?php
require_once("../dao/TeacherDAO.php");
$insID=$_GET['insID'];
$teacherDao=new TeacherDAO();
$result=$teacherDao->queryTeacherDetailByInsID($insID);
if(false!==$result){
    $teacherArray=array();
    foreach ($result as $teacher)   {
        $str='{"insID":"'.$teacher->insID.'","insName":"'.$teacher->insName.'","majorName":"'.$teacher->majorName.'","teacherID":"'.$teacher->teacherID.'","teacherName":"'.$teacher->teacherName.'","salary":'.$teacher->Salary.'}';
        array_push($teacherArray,$str);
    }
        print_r($teacherArray);
}else{
    echo "error";
}
