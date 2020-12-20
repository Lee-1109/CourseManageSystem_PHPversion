<?php
function output($dir_handle)
{
    if(($file=readdir($dir_handle))==FALSE)
        return $dir_handle;
    echo $file.'<br/>';
    return output($dir_handle);
}
$dir="D:\\";
$dir_handle=opendir($dir);
if(output($dir_handle))
{
    echo"打开目录成功！";
    closedir($dir_handle);
}
else
    echo"打开目录失败";

