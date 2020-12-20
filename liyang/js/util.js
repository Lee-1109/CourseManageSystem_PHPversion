function back(){
    window.history.back();
}

function confirm_leaveMessage() {
    var area=document.getElementById("messageSubmit");
    var message=trim(area.value);
    if(message===""){
        alert("请输入留言信息");
    }
}