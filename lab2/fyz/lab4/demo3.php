<html>
<head>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="myFile">
    <input type="submit" name="submit" value="上传">
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    if($_FILES['myFile']['type']=="text/plain" ||
        $_FILES['myFile']['type']=="image/jpeg" ||
        $_FILES['myFile']['type']=="application/msword" ||
        $_FILES['myFile']['type']=="image/png")
    {
        if($_FILES['myFile']['error']>0)
            echo"错误：".$_FILES['myFile']['error'];
        else
        {
            $tmp_filename=$_FILES['myFile']['tmp_name'];
            $filename=$_FILES['myFile']['name'];
            $dir="D:/";
            if(is_uploaded_file($tmp_filename))
            {
                if(move_uploaded_file($tmp_filename,"$dir.$filename"))
                {
                    echo"文件上传成功！";
                    echo"文件大小为".($_FILES['myFile']['size']/1024)."KB";
                }
                else
                    echo"文件上传失败！";
            }
        }
    }
    else
    {
        echo"文件格式不是txt、doc、jpg、png格式，请检查。";
    }
}

