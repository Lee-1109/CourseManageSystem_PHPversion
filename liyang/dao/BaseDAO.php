<?php

/**
 * Class BaseDAO
 * 基本数据访问对象
 */
abstract class BaseDAO
{
    protected $userName="root";
    protected $userPassword="tiger";
    protected $server="localhost";
    protected $dataBaseName="php_liyang";
    protected $connection;//与数据库的连接

    public function __construct()
    {
        $this->getConnection();
    }

    /**
     * 获得与数据库的连接
     * @return false|mysqli
     */

    public  function getConnection(){
        $this->connection=new mysqli($this->server,$this->userName,$this->userPassword,$this->dataBaseName);
        if($this->connection)
            return $this->connection;
        else
            return false;
    }

    public function __destruct()
    {
        if($this->connection){
            mysqli_close($this->connection);
        }
    }
}