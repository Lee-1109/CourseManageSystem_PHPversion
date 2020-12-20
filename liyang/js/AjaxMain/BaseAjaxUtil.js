function getXMLHttpRequestObject() {
    let XmlHttp=null;
    try{
        XmlHttp=new XMLHttpRequest();
    }catch (e) {
        try{
            XmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }catch (e){
            XmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return XmlHttp;
}

function doLogin() {
    let XMLHttp=getXMLHttpRequestObject();
    let XH=document.getElementById('XH').value;
    let MM=document.getElementById('MM').value;
    let LX=document.getElementById('LX').value;
    let url="../php/doLogin.php?XH="+XH+"&MM="+MM+"&LX="+LX;//指定处理登陆程序的服务器脚本
    XMLHttp.open("GET",url,true);//以post方法打开XMLhttp对象
    XMLHttp.send();//发送请求串
    XMLHttp.onreadystatechange=function (){//定义相应处理函数
        if(XMLHttp.readyState===4 && XMLHttp.status===200){
            if(XMLHttp.responseText==="error"){
                //标记登陆失败
                document.getElementById("loginSpan").innerText="用户名或者密码或类型错误，请检查";
            }
        }
    }

}