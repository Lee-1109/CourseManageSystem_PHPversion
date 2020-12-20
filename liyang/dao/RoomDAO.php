<?php

require_once("BaseDAO.php");
class RoomDAO extends BaseDAO
{

    public function queryAllRoomDetail(){
        $i=0;
        $roomArray=array();
        $result=mysqli_query($this->connection,"select * from view_roomdetail");
        if($result!=false){
            while($room=mysqli_fetch_object($result)){
                $roomArray[$i++]=$room;
            }
            return  $roomArray;
        }
        return false;
    }


    public function queryAllRoom_Name(){
        $rooms=$this->queryAllRoomDetail();
        if(false!==$rooms){
            $roomName=array();$i=0;
            foreach($rooms as $room){
                $roomName[$i++]=$room->roomName;
            }
            return $roomName;
        }
        return false;
    }
}