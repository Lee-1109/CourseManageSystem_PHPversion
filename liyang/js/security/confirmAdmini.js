function doConfirm() {
    let password=prompt("请输入管理员密码验证");
    if(password==="991109") {
        alert("课程信息修改成功");
        return true;
    }else{
        alert("密码错误，不允许修改！");
        return false;
    }
}