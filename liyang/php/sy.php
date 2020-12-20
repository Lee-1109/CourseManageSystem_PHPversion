<?php
$page=isset($_GET['page'])? $_GET['page']:1;
echo "<h1>当前是第".$page."页<br></h1>";
echo "<a href='".$_SERVER['PHP_SELF']."?page=1'>首页&nbsp;</a>";
if($page==1)
{echo "<a href=''>上一页&nbsp;</a>";}
if($page>1){
    echo "<a href='".$_SERVER['PHP_SELF']."?page=".($page-1)."'>上一页&nbsp;</a>";
}
if($page<80){
    echo "<a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."'>下一页&nbsp;</a>";
}
if($page==80)
{echo "<a href=''>下一页&nbsp;</a>";}
echo "<a href='".$_SERVER['PHP_SELF']."?page=80'>末页&nbsp;</a>";
