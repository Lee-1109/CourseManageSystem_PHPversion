<?php
require_once ("BaseDAO.php");
/**
 * Class MySqlDAO数据库连接类
 */
class UserDAO extends BaseDAO {
    private static $selectUser="select * from login";

    /**
     * @param $username  the user input name
     * @param $userPassword the user input password
     * 验证用户的身份 如果存在此用户 就允许登陆
     * @param $userType
     * @return false|object|null
     */
     public function validate($username,$userPassword,$userType){
        if($users=mysqli_query($this->connection,self::$selectUser)){
            while($user=mysqli_fetch_object($users)){
                if($user->userID===$username && $user->password===$userPassword && $user->type==$userType)
                    return $user;
            }
        }
        return false;
     }

    /**
     * @param $id
     * @param $password
     * @param $nickName
     * @param $userName
     * @param $email
     * @param $address
     * @return bool 将注册页面的信息插入数据库
     */
    public function register($id,$password,$nickName,$userName,$email="暂未填写",$address="暂未填写"){
        /**
         * login表的插入
         */
        $user_sql="insert into users (id,password) values (?,?)";
        $user_information_sql="insert into users_information (id,nickName,userName,email,address) values (?,?,?,?,?)";
        $this->connection=new mysqli($this->server,$this->userName,$this->userPassword,$this->dataBaseName);
        $statement=$this->connection->prepare($user_sql);
        $statement->bind_param("ss", $sql_id, $sql_password);
        $sql_id=$id;
        $sql_password=$password;
        if(false==$statement->execute()) return false;
        /**
         * user Information表的插入
         */
        $statement=$this->connection->prepare($user_information_sql);
        $statement->bind_param("sssss",$sql_id,$sql_nickName,$sql_userName,$sql_email,$sql_address);
        $sql_id=$id;
        $sql_nickName=$nickName;
        $sql_userName=$userName;
        $sql_email=$email;
        $sql_address=$address;
        if(false==$statement->execute()) return false;
        return true;
     }

    /**
     * @param $id 用户ID
     * @param $type 系统用户类型 0 学生 1教师 2 管理员
     * @return array|false 如果查询完毕 返回结果集 否则 返回false
     */
     public function findUserDetailById($id,$type){
         switch ($type){
             case 0:
                 $sql="select * from students where studentID= '{$id}' ";
                    break;
             case 1:
                  $sql="select * from teachers where teacherID= '{$id}' ";
                  break;
             default:$sql="select * from admins where adminID= '{$id}'";
         }
         return $this->executeQuery($sql);
     }

    /**
     * @param $id
     * @return array|null
     * 通过用户的id找到此ID发布的留言信息
     */
     public function findUserMessageById($id){

         $result=mysqli_query($this->connection,"select * from message where id=".$id );
         return mysqli_fetch_row($result);
     }


    public function getUserDetail($id,$type){
         switch ($type){
             case 0:
                 $sql="select studentID,studentName,gender,age,email from students";
                 break;
             case 1:
                 $sql="select";
         }
    }



    private function executeQuery($sql){
        $result=mysqli_query($this->connection,$sql);
        if(FALSE===$result) return false;//数据查询出错
        $userArray=null;
        while ($user=mysqli_fetch_object($result)) $userArray=$user;
        return $userArray;
    }
}