<?php

require_once ("BaseDAO.php");
class StudentDAO extends BaseDAO
{
    /**
     * @return array|false 有结果返回结果对象数组 否则返回fasle
     */
    public function getStudentIdAndNameByCourse($courseID){
          $SQL="select studentID,studentName from students where classID in (select classID from view_insmajorclass v where v.majorID in(select majorID from coursemajor where courseID='{$courseID}') )";
          return $this->executeQuery($SQL);
    }

    /**
     * @param $insID
     * @return array|false 返回数组 数组里面是关联数组
     */
    public function queryStudentDetailByInsID($insID){
        $SQL="select * from students where classID in ".
            " (select classID from view_insmajorclass  where insID ='{$insID}')";
        return $this->executeQuery($SQL);

    }
    public function queryStudentByClass($classID){
        $SQL="select * from students where classID= '{$classID}' ";
        return $this->executeQuery($SQL);
    }
    private function executeQuery($SQL){
        $studentArray=array();
        $i=0;
        $students=mysqli_query($this->connection,$SQL);
        if($students==false) return false;

        while($student=mysqli_fetch_object($students)){
            $studentArray[$i++]=$student;
        }
        if(count($studentArray)==0) return false;
        return $studentArray;
    }


}