<?php
/*
（1）构造一个名字为students的二维数组，每个学号代表一名学生，该学生的信息由“姓名”、“性别”、“成绩”组成，
数组中的元素至少具备5条。
（2）按照学生的成绩高低对该二维数组进行排序，并在网页中显示排序前后的students数组.
（3）输出排序后的结果。
*/
function print_array($students){
    echo "<table width=200 border=1 >";
    echo "<tr><td>姓名</td><td>性别</td><td>成绩</td></tr>";
    foreach($students as $value){
        echo "<tr><td>".$value['name']."</td><td>".$value['sex']."</td><td>".$value['grade']."</td></tr>";
    }
    echo "</table>";
}
$students=array(
    array("name"=>"李扬","sex"=>"男","grade"=>100),
    array("name"=>"李江","sex"=>"男","grade"=>88),
    array("name"=>"杨骏","sex"=>"女","grade"=>91),
    array("name"=>"吴臻","sex"=>"男","grade"=>78),
    array("name"=>"曾春文","sex"=>"男","grade"=>54),
    array("name"=>"骏骏","sex"=>"男","grade"=>65)
);
echo "<hr><h1>"."排序前"."</h1><hr>";
print_array($students);

$temp_data=array();
foreach($students as $key=>$value){
    $temp_data[$key]['grade']=$value['grade'];
}
array_multisort($temp_data,SORT_DESC,$students);
echo "<br><hr><h1>"."排序后"."</h1><hr><br>";
print_array($students);
