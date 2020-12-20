<?php

require_once ("BaseDAO.php");
class GradeDAO extends BaseDAO
{
  public function studentGetOwnGrade($id,$term){
      if($term==0){
          $sql="select v.courseID,v.courseName,v.credit,v.coursePeriod,v.term,v.grade from view_grade v where  studentID='{$id}' ";
      }else{
          $sql="select v.courseID,v.courseName,v.credit,v.coursePeriod,v.term,v.grade from view_grade v where  studentID='{$id}' and term= {$term} ";
      }

      return$this->executeQuery($sql);
  }

    /**
     * @param $courseID
     * @param $studentID
     * @param $grade
     * @return bool|mysqli_result 教师添加成绩
     */
  public function teacherAddGrade($courseID, $studentID, $grade){
      $sql="insert into grades values('{$courseID}','{$studentID}',$grade)";
      return $this->executeUpdate($sql);
  }

  public function teacherGetGrade($courseID){
      $sql=" select studentID,studentName,grade from view_grade where courseID= '{$courseID}' order by studentID";
      return $this->executeQuery($sql);
  }

  public function updateGrade($courseID,$studentID,$grade){
      $sql="update grades set grade= {$grade}  where courseID= '{$courseID}' and  studentID='{$studentID}' ";
      return mysqli_query($this->connection,$sql);
  }

    private function executeQuery($sql){
        $courses=mysqli_query($this->connection,$sql);
        $allCourseArray=array();
        $i=0;
        if(false==$courses) return false;
        while($course=mysqli_fetch_object($courses)){
            $allCourseArray[$i++]=$course;
        }
        return $allCourseArray;
    }
    private function executeUpdate($sql){
      return mysqli_query($this->connection,$sql);
    }
}