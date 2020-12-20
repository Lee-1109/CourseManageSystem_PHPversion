<?php
require_once ("../../dao/LoginDAO.php");
require_once("../head.php");
?>
<html lang="en">
<head>
    <title>教师信息管理</title>
    <script src="../../js/AjaxMain/BaseAjaxUtil.js" type="text/javascript" rel="script"></script>
    <script>
        function run(){
            let XMLHttp=getXMLHttpRequestObject();
            //通过js获取选择的学院的编号
            let ins=document.getElementById('ins').value;
            //编写请求处理的URL
            let url="../ajax_getTeacherByInsID.php?insID="+ins+""+"&sid="+Math.random();//输入随机数防止使用缓存文件
            XMLHttp.open("GET",url,true);
            XMLHttp.send();//发送请求串 GET方法发送空
            XMLHttp.onreadystatechange=function (){//定义相应处理函数
                if(XMLHttp.readyState===4 && XMLHttp.status===200){
                    if(XMLHttp.responseText!=='error'){
                        let str=XMLHttp.responseText;
                        //使用正则表达式提取大括号之间的JSON数组
                        let reg=/(?<={).*?(?=})+/g;
                        let temp=str.match(reg);
                        //如果表格不空 就移除表格
                        let table=document.getElementsByTagName("table")[1];
                        if(table) table.parentNode.removeChild(table);
                        table=document.createElement("table");
                        let tBody=document.createElement("tBody");
                        //使用js代码创建表格
                        for(let i=0;i<temp.length;i++){
                            let one="{"+temp[i]+"}";
                            console.log("json转换结果"+one);
                            //分析构造出一个js对象
                            let obj=JSON.parse(one);
                            console.log(obj.teacherName);
                            let tr=tBody.insertRow(i);
                            let tdInsID=tr.insertCell(0);
                            tdInsID.innerHTML=obj.insID;
                            let tdInsName=tr.insertCell(1);
                            tdInsName.innerHTML=obj.insName;
                            let tdMajorName=tr.insertCell(2);
                            tdMajorName.innerHTML=obj.majorName;
                            let tdTeacherID=tr.insertCell(3);
                            tdTeacherID.innerHTML=obj.teacherID;
                            let tdTeacherName=tr.insertCell(4);
                            tdTeacherName.innerHTML=obj.teacherName;
                            let tdSalary=tr.insertCell(5);
                            tdSalary.innerHTML=obj.salary;
                            let tdModify=document.createElement("a");
                            let a = document.createElement('a');
                            a.innerText="部门变动";
                            a.setAttribute('href', "#");
                            a.setAttribute('target', '_blank');
                            a.setAttribute('id', "modify"+obj.teacherID);
                            tdModify.innerText=a;
                            a.appendChild(tdModify);
                        }
                        table.appendChild(tBody);
                        document.body.appendChild(table);
                    }
                    else {//数据库查询为空
                        let table=document.getElementsByTagName("table")[1];
                        if(table) table.parentNode.removeChild(table);
                        let tBody=document.createElement("tBody");
                        table=document.createElement("table");
                        let tr=table.insertRow(0);
                        let td=tr.insertCell(0);
                        table.appendChild(tBody);
                        td.innerText="暂无内容";
                        table.appendChild(tBody);
                        document.body.appendChild(table);
                    }
                }
            }
        }
    </script>
</head>
<body>
<a href="#">导入新教师信息</a>
<?php
//下拉选择框文件
require_once ("../../dao/StructDAO.php");
require_once("../conditionIns.php");
?>

<table>
    <tr>
        <td>学院编号</td>
        <td>所属学院</td>
        <td>所属专业</td>
        <td>工号</td>
        <td>教师名字</td>
        <td>工资</td>
        <td colspan="2">操作</td>
    </tr>
</table>
<table></table>
</body>

</html>
