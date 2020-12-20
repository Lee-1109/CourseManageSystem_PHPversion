
function validate(){
    var id=document.getElementById("register_id").value;
    var message=document.getElementById("button");
    alert(id);
    if(id=="18045221"){

        message.innerText="该账已存在";
        history.back()-1;
    }
    else
        message.innerText="验证通过";
}
