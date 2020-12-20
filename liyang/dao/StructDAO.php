<?php
/**
 * 对学院 专业 班级 三级统一管理DAO类
 */
require_once ("BaseDAO.php");
class StructDAO extends BaseDAO
{
    /**
     * @return array|false
     * 返回学院的ID和信息
     */
    function getInstituteName(){
        $sql="select instituteID,instituteName from institutes";
        return $this->executeQuery($sql);
    }

    function getInsStructByInsId($insId){
        $sql="select insID,insName,majorID,majorName,classID from view_insmajorclass  where insID='{$insId}' order by classID";
        return $this->executeQuery($sql);
    }

    function getInsMajorClassName(){
        $sql="select insID,insName,majorID,majorName,classID  from view_insmajorclass order by classID";
        return $this->executeQuery($sql);
    }

    function executeQuery($sql){
        $result=mysqli_query($this->connection,$sql);
        $insArray=array();
        $i=0;
        while($ins=mysqli_fetch_object($result)){
            $insArray[$i++]=$ins;
        }
        if(count($insArray)==0) return false;
        return $insArray;
    }

}