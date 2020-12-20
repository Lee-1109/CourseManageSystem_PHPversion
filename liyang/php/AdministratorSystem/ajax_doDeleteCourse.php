<?php
if(isset($_GET['id'])){
    require_once("../../dao/CourseDAO.php");
    $courseDao=new CourseDAO();
    $courseID=$_GET['id'];
    if(false!==$courseDao->delete($courseID))
        echo "success";
    else echo "error";
}