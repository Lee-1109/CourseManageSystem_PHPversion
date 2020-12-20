<?php
$teacherDao=new TeacherDAO();
if(false!==$teacherDao->getAllTeacherIdAndName()){
    echo<<<OUT
    <select  id="teach" name="t"  onchange="">
    <option>请选择</option>
OUT;
    $teacherArray=$teacherDao->getAllTeacherIdAndName();
    foreach($teacherArray as $one)
        echo<<<OUT
        <option value="$one->teacherID">$one->instituteName  $one->teacherID  $one->teacherName </option>
OUT;
}
echo <<<OUT
</select>
OUT;
