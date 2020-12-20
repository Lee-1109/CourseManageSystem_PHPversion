<?php
require_once ("../../dao/MessageDAO.php");
$messageID=$_GET['msgID'];
$messageDAO=new MessageDAO();
if($messageDAO->delete($messageID))
    echo "success";
else echo "error";