<?php

require_once ("BaseDAO.php");
class LoginDAO extends BaseDAO
{

    public function getUserIdAndName(){
        $sql="select userID,tureName from login" ;
        $result=mysqli_query($this->connection,$sql);
        if(FALSE===$result) return false;//数据查询出错
        $userArray=null;
        $i=0;
        while ($user=mysqli_fetch_object($result)) $userArray[$i++]=$user;
        return $userArray;
    }

    public function getUserDetailById($id){
        return $this->executeQuery("select userID,tureName,type,email from login where userID ='{$id}'");
    }

    public function validatePassword($id,$password){
        $sql="select password from login where userID='{$id}' ";
        $result=$this->executeQuery($sql);
        if(false!==$result){
            foreach ($result as $one) $temp=$one->password;
            if($temp==$password) return true;
        }
        return false;
}
    public function update($id,$password,$tureName,$email){
        $sql="update login set tureName='{$tureName}' and password='{$password}' and email='{$email}' where userID='{$id}'";
        $this->executeUpdate($sql);
    }


    private function executeQuery($sql){
        $result=mysqli_query($this->connection,$sql);
        if(FALSE===$result) return false;//数据查询出错
        $userArray=null;
        while ($user=mysqli_fetch_object($result)) $userArray=$user;
        return $userArray;
    }

    private function executeUpdate($sql){
        return mysqli_query($this->connection,$sql);

    }
}