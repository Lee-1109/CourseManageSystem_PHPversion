/*本js文件用于检验用户输入表单信息的合法性*/
/*来源：doUpdateUserDetail.php*/

/**
 * 去除空格
 * @param string
 * @returns {*}
 */
function trim(string){
    return string.replace(/^\s+|\s+$/g,"");
}

/**
 * 检查真实名字的输入情况
 */
function checkTrueName() {
    var name=document.getElementById("trueName");
    var value=trim(name.value);
    if(value==""){
        var nickName=document.getElementById("trueNameSpan");
        nickName.innerText="用户真实姓名不能为空";
    }
}

/**
 * 检查邮箱格式
 */
function checkEmailFormat() {
    let email=document.getElementById("email");
    var emailSpan=document.getElementById("emailSpan");
    var reg=/[0-9a-zA-Z_.-]+[@][0-9a-zA-Z_.-]+([.][a-zA-Z]+){1,2}$/;
    if(!reg.test(email.value) ){
        emailSpan.innerText="邮箱格式错误!";
    }else{
        emailSpan.innerText="检查通过";
    }
}

function checkPassword(){
    let password=document.getElementById('password');
    let newPassword=document.getElementById('newpassword');
    if(password.value!==newPassword.value){
        document.getElementById('passwordSpan').innerText="两次密码不一致，请修改";
        return false;
    }else {
        document.getElementById('passwordSpan').innerText="检查通过";
        return true;
    }
}


