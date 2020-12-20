<?php
/**
 * Class MessageDAO
 * 用于查询数据库中用户留言信息
 */
require_once ("BaseDAO.php");
class MessageDAO extends BaseDAO
{
    /**
     * @param $postID 发送信息的id
     * @param $receiveID 接收信息的id
     * @param $message 发送的信息
     * @return bool 留言成功返回true 失败返回false
     */
    public function save($postID, $receiveID, $title, $message){
        $SQL="insert into messages(postID,receiveID,title,message) values(?,?,?,?)";
        $this->connection=new mysqli($this->server,$this->userName,$this->userPassword,$this->dataBaseName);
        $statement=$this->connection->prepare($SQL);
        $statement->bind_param("ssss",$sql_id,$sql_Tid,$sql_title,$sql_message);
        $sql_id=$postID;
        $sql_Tid=$receiveID;
        $sql_title=$title;
        $sql_message=$message;
        if($statement->execute()==false) return false;
        else return true;
    }


    public function delete($messageID){
        $sql="delete from messages where messageID= {$messageID}";
        return mysqli_query($this->connection,$sql);
    }

    /**
     * @param $id
     * @return array|bool  返回指定用的的接收信息
     */
    public function  getMessageById($id){
        $SQL="select * from messages where receiveID = '{$id}'";
        $messages=mysqli_query($this->connection,$SQL);
        $messageArray=array();
        $i=0;
        while( $message = mysqli_fetch_object($messages) ){
            $messageArray[$i++]= $message;
        }
        if(count($messageArray)==0) return false;
        return $messageArray;
    }
}