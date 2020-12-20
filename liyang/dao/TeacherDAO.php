<?php

require_once  ("BaseDAO.php");
class TeacherDAO extends BaseDAO
{

    public function queryTeacherDetailByInsID($insID){
        return $this->executeQuery("select * from view_teacherdetail where insID= '{$insID}' " );
    }
    /**
     * 插查询教师的详细信息 学院编号，学院名称 专业名称 工号 教师名称 工资
     * @return array|false
     */
    public function queryAllTeacherDetail(){
        return $this->executeQuery("select *from view_teacherdetail");
    }

    public function getAllTeacherIdAndName(){
        $sql="select instituteName,majorID,majorName,teacherID,teacherName from view_insmajorteacher";
        return $this->executeQuery($sql);

    }
    /**
     * @return array|false
     */
    public function getAllTeacherIdAndNameByIns($insId){
        $sql="select instituteID,teacherID,teacherName from view_insmajorteacher v where v.instituteID='{$insId}'";
        return $this->executeQuery($sql);

    }


    /**
     * @param $SQL   要执行查询的sql语句
     * @return array|false 成功返回对象数组 失败返回fasle
     */
    private function executeQuery($SQL){
        $i=0;
        $teacherArray=array();
        $teachers=mysqli_query($this->connection,$SQL);
        if(false!== $teachers){
            while( $teacher=mysqli_fetch_object($teachers)){
                $teacherArray[$i++]=$teacher;
            }
            return  $teacherArray;
        }
        else return false;
    }

    /**
     * @param $SQL  要执行的删除或者更新语句
     * @return bool|mysqli_result 执行删改
     */
    private function executeUpdate($SQL){

    return mysqli_query($this->connection,$SQL);

    }

}
