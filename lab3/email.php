<?php
$email=$_POST['email'];

function checkEmail($email){
    $email_pattern="/^([a-zA-Z0-9]{5,9})+@[a-zA-Z0-9]+\.[a-zA-Z0-9\-\.]+$/";
    $my_email="/[0-9a-zA-Z_.-]+[@][0-9a-zA-Z_.-]+([.][a-zA-Z]+){1,2}$/";
    //my_email()函数用来校验邮箱格式的正确性
    if (preg_match($my_email,$email) == 1){
        $result = $email." 是合法的邮箱格式\n";
    } else if (preg_match($my_email,$email) == 0) {
        $result = $email." 不是合法的邮箱格式\n";
    }
    echo $result;
}
checkEmail($email);
