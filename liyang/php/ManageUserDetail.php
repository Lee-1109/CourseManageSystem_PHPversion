<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息更改</title>
    <script src="../js/checkUpdate.js" type="text/javascript" rel="script"></script>
</head>
<body>
<h5>您的详细信息</h5>
<hr>
<div class="form" >
    <form action="doUpdateUserDetail.php" method="POST" onsubmit="return checkPassword();">
        <?php
        require_once("../dao/LoginDAO.php");
        $loginDao=new LoginDAO();
        $userID=1;
        $tureName=2;
        $email=3;
        if(isset($_COOKIE['nowUserID'])&&isset($_COOKIE['nowUserType'])){
            $id=$_COOKIE['nowUserID'];
            $type=$_COOKIE['nowUserType'];
            $one=$loginDao->getUserDetailById($id);
            if(false==$one) echo "error";
            else{
                $userID=$one->userID;
                $tureName=$one->tureName;
                $email=$one->email;
            }
        }
        ?>
        <img src="#" alt="头像"><br>
        登陆账号：<input type="text" name="id" value="<?php echo $userID ?>" readonly="true"/><br>
        真实姓名：<input type="text" id="tureName" name="tureName" value="<?php echo $tureName ?>" onblur="checkTrueName()"/><span id="tureNameSpan"><br>
        电子邮箱: <input type="email" id="email" name="email" value="<?php echo $email?>" onblur="checkEmailFormat()"/><span id="emailSpan"></span><br>
        密码更换: <input type="password" id="password" name="password" /><br>
            确认密码: <input type="password" id="newpassword" name="newpassword" onblur="checkPassword()"/><span id="passwordSpan"></span><br>
        <input type="submit" value="保存"/>
        <input type="reset" value="重置"/>
    </form>
</div>
</body>
</html>




