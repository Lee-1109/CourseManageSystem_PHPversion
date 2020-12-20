<?php
/**
 * Class MySqlDAO数据库连接类
 */
class MySqlDAO{
    private $userName="root";
    private $userPassword="tiger";
    private $server="localhost";
    private $dataBaseName="php_liyang";
    private $link;
    private static $getUser="select * from users";

    /**
     * 获得与数据库的连接
     * @return false|mysqli
     */
    public function getConnection(){
        $this->link=new mysqli($this->server,$this->userName,$this->userPassword,$this->dataBaseName);
        if($this->link)
            return $this->link;
        else
            return false;
    }

    /**
     * @param $dataBaseName 更改的数据库名字
     */
    public function alterDatabaseName($dataBaseName){
        $this->dataBaseName=$dataBaseName;
    }


    /**
     * @param $username
     * @param $userPassword
     * 验证用户的身份
     */
     public function validate($username,$userPassword){
        if($result=mysqli_query($this->link,self::$getUser)){
            while($row=mysqli_fetch_row($result)){
                list($name,$password)=$row;
                if($name===$username && $password===$userPassword)
                    return TRUE;
            }
        }
        return FALSE;
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
    public function register($id,$password,$nickName,$userName,$email,$address="暂未填写"){
        $user_sql="insert into users (id,password) values (?,?)";
        $user_information_sql="insert into users_information (id,nickName,userName,email,address) values (?,?,?,?,?)";
        $connection=new mysqli($this->server,$this->userName,$this->userPassword,$this->dataBaseName);
        $statement=$connection->prepare($user_sql);
        $statement->bind_param("ss", $sql_id, $sql_password);
        $sql_id=$id;
        $sql_password=$password;
        if(false==$statement->execute()) return false;

        $statement=$connection->prepare($user_information_sql);
        $statement->bind_param("sssss",$sql_id,$sql_nickName,$sql_userName,$sql_email,$sql_address);
        $sql_id=$id;
        $sql_nickName=$nickName;
        $sql_userName=$nickName;
        $sql_email=$email;
        $sql_address=$address;
        if(false==$statement->execute()) return false;
        return true;
     }

    /**
     * @param $id
     * @return mixed
     */
     public function findUserById($id){
        return mysqli_query($this->link,"select * from users_information where id=".$id );
     }

    /**
     *关闭数据库连接
     */
    public function closeConnection(){
        if($this->link){
            mysqli_close($this->link);
        }
    }



    /**
     * <============================getter setter========================方法======>
     */
    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param string $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * @param string $userPassword
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    }

}