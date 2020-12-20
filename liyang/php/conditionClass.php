<?php
/**
 * 条件查询下拉选择框 根据班级查询
 * Ajax
 */
$classes=new StructDAO();
echo <<<OUT
<select  id="cla" onchange="run()">
<select  id="cla" name="c"  onchange="run()">
<option>请选择</option>
OUT;
if(false!==$classes->getInsMajorClassName()){
    $insArray=$classes->getInsMajorClassName();
    foreach($insArray as $class){
        $classID=$class->classID;
        echo "<option value=\"$class->classID\">$class->classID</option>";
    }
}
echo "</select>";