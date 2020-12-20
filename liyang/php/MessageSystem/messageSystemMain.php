<?php require_once("../head.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言信息系统主页</title>
    <script src="../../js/BaseJs/Confirm.js" type="text/javascript" rel="script"></script>
    <script src="../../js/util.js" type="text/javascript" rel="script"></script>
</head>
<body>
<div class="container">
    <a href="LeaveMessage.php">发件箱</a><br>
    <hr>
    <table>
        <tr>
            <td>文章标题</td>
            <td>发送者</td>
            <td>接收时间</td>
            <td colspan="2">操作</td>
        </tr>
            <?php
            require_once("../../dao/MessageDAO.php");
            $message = new MessageDAO();
            if(false!==$message->getMessageById($_COOKIE['nowUserID'])){
                $receive=$message->getMessageById($_COOKIE['nowUserID']);
                foreach($receive as $one){
                    echo "<tr>";
                    echo "<td>$one->title</td>";
                    echo "<td>$one->postID</td>";
                    echo "<td>$one->leaveDate</td>";
                    //查看留言信息详情
                    echo "<td><a href=\"doGetMessageDetail.php?title=$one->title&sender=$one->postID&time=$one->leaveDate&message=$one->message\">详情</a></td>";
                    echo "<td><a href=\"\">回复</a></td>";
                    //删除留言信息
                    echo "<td><a href=\"doDeleteMessage.php?msgID=$one->messageID\" onclick='return deleteConfirm()'>删除</a></td>";
                    echo "</tr>";
                }
            }else{
                echo "<br>"."暂时没收到信息哦";
            }
            ?>
    </table>
    <button onclick="back();">返回上一页</button>
</div>
</body>
</html>
