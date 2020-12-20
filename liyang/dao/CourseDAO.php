<?php

require_once  ("BaseDAO.php");
class CourseDAO extends BaseDAO
{

    /**
     * @return bool 插入课程成功返回true 否则返回false
     */
    public function add($courseID, $courseName, $credit, $coursePeriod, $term, $courseType,$beginWeek,$endWeek){
       $SQL="insert into courses(courseID,courseName,credit,coursePeriod,term,courseType,beginWeek,endWeek) values(?,?,?,?,?,?,?,?)";
       $this->connection=new mysqli($this->server,$this->userName,$this->userPassword,$this->dataBaseName);
       $statement=$this->connection->prepare($SQL);
       $statement->bind_param("ssdiiiii",$sql_id,$sql_name,$sql_credit,$sql_time,$sql_term,$sql_type,$sql_begin,$sql_end);
       $sql_id=$courseID;
       $sql_name=$courseName;
       $sql_credit=$credit;
       $sql_time=$coursePeriod;
       $sql_term=$term;
       $sql_type=$courseType;
       $sql_begin=$beginWeek;
       $sql_end=$endWeek;
       if($statement->execute()==false) return false;
       else return true;
    }
    public function delete($courseID){
        $sql="delete from courses where courseID='{$courseID}'";
        return $this->executeUpdate($sql);
    }

    /**
     * @param $id
     * @param $name
     * @param $credit
     * @param $time
     * @return bool  如果更新课程信息成功 返回true 否则返回false
     */
    public function update($id, $name, $credit, $time){
        $SQL="update courses set courseName='{$name}',credit={$credit},coursePeriod={$time} where courseID= '{$id}' ";
       $this->executeUpdate($SQL);
    }



    /**
     * @param $courseID
     * @return int 返回开设本课程的专业部门数
     */
    public function getBeginCourseCount($courseID){
        $result=mysqli_query($this->connection,"select count(*) as num from coursemajor where courseID= '{$courseID}' ");
        if(false==$result) return -1;
        $row=mysqli_fetch_object($result);
        return $row->num;
    }


    /**
     * @param $teacherID
     * @param $status
     * @return array|false   查询教师任教课程的成绩录入情况
     */
    public function queryTeacherCourseGrade($teacherID,$status){
        if($status==0){//成绩未录入
            $sql="select c.courseID,courseName from coursemajor c,courses  ".
                "where c.courseID=courses.courseID and teacherID='{$teacherID}' ".
                "and  c.courseID not in (select distinct courseID from view_grade) ";
        }else{//成绩已经录入
            $sql="select v.courseID,v.courseName from view_grade v group by courseID";
        }

        return $this->executeQuery($sql);
    }

    /**
     * @param $courseID
     * @param $studentID
     * @return bool|mysqli_result 学生选课
     */
    public function studentSelectOptionalCourse($courseID,$studentID){
        $sql="insert into coursestudent(courseID,studentID) values('{$courseID}','{$studentID}')";
        return $this->executeUpdate($sql);
    }

    /**
     * @param $courseID
     * @param $studentID
     * @return bool|mysqli_result 学生退选课程
     */

    public function studentWithDrawOptionalCourse($courseID,$studentID){
        $sql="delete from coursestudent where courseID= '{$courseID}' and studentID = '{$studentID}' ";
        return $this->executeUpdate($sql);
    }

    /**
     * 查询所有必修课
     */
    public function queryRequiredCourse(){
        return $this->executeQuery("select * from courses where courseType= 0");
    }

    /**
     * 查询学生没选过的选修课
     */
    public function studentGetNotSelectedOptionalCourse($studentID){
        return $this->executeQuery("select * from courses ".
            "  where courseType= 1 and courseID ".
            " not in ( select courseID from coursestudent where studentID='{$studentID}')");
    }

    /**
     * @param $studentID
     * @return array|false 查询学生选修过的课程
     */
    public function studentGetSelectedOptionalCourse($studentID){
        return $this->executeQuery("select * from courses ".
            "  where courseType= 1 and courseID ".
            "  in ( select courseID from coursestudent where studentID='{$studentID}')");
    }

    /**
     * 根据学院标号查询开设课程信息     *
     * @param $insID
     * @return array|false
     */
    public function getCourseByInsID($insID){
        $sql="select * from coursemajor where majorID in".
            " (select majorID from view_insmajorclass ".
            "where insID= '{$insID}')";
        return $this->executeQuery($sql);
    }

    /**
     * administrator
     * @return bool|array 如果课程查询成功 返回true 否则返回false
     */
    public function getAllCourse(){
        return $this->executeQuery("select * from courses");
    }
    public function getAllMajorCourse(){
        return $this->executeQuery("select * from courses where courseID not in (select courseID from coursemajor) order by courseID");
    }
    /**
     * @return bool|mysqli_result 添加专业课的任教计划
     */
    public function addMajorCourse($courseID,$majorID,$teacherID){
        $sql="insert into coursemajor values ('{$courseID}','{$majorID}','{$teacherID}')";
        return $this->executeUpdate($sql);
    }

    /**
     * @param $sql
     * @return bool|mysqli_result 执行改和查
     */
    private function executeUpdate($sql){
        return mysqli_query($this->connection,$sql);
    }

    /**
     * @param $sql
     * @return array|false 执行查询语句
     */
    private function executeQuery($sql){
        $courses=mysqli_query($this->connection,$sql);
        $allCourseArray=array();
        $i=0;
        if(false==$courses) return false;
        while($course=mysqli_fetch_object($courses)){
            $allCourseArray[$i++]=$course;
        }
        if(count($allCourseArray)==0) return  false;
        return $allCourseArray;
    }


}