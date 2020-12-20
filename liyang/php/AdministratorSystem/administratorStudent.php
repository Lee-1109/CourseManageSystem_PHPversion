<?php
require_once ("../../dao/LoginDAO.php");
require_once("../head.php");
echo <<<OUT
<a href="#" onclick="location.href='administratorMain.php'">返回主页</a>>>>学生信息管理与查询
OUT;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
    <!--引入Ajax基本方法-->
    <script src="../../js/AjaxMain/BaseAjaxUtil.js" type="text/javascript" rel="script"></script>
    <script src="../../js/BaseJs/outNullTable.js" type="text/javascript" rel="script"></script>
    <!--通过Ajax完成学生信息按班级和年龄查询-->
    <script>
        function run() {
            XMLHttp=getXMLHttpRequestObject()
            //通过js获取选择的学院的编号
            let ins=document.getElementById('ins').value;
            let input=document.getElementById("pageNum");
            //编写请求处理的URL
            let url="../ajax_getStudentByInsID.php?insID="+ins+""+"&page="+Math.random();//传递学院ID以及页码
            XMLHttp.open("GET",url,true);
            XMLHttp.send();//发送请求串 GET方法发送空
            XMLHttp.onreadystatechange=function (){//定义相应处理函数
                if(XMLHttp.readyState===4 && XMLHttp.status===200){
                    if(XMLHttp.responseText!=='error'){
                        let str=XMLHttp.responseText;
                        //使用正则表达式提取页码
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
                            //分析构造出一个js对象
                            let obj=JSON.parse(one);
                            let tr=tBody.insertRow(i);
                            let tdClassID=tr.insertCell(0);
                            tdClassID.innerHTML=obj.class;
                            let tdStudentID=tr.insertCell(1);
                            tdStudentID.innerHTML=obj.studentID;
                            let tdStudentName=tr.insertCell(2);
                            tdStudentName.innerHTML=obj.name;
                            let tdGender=tr.insertCell(3);
                            tdGender.innerHTML=obj.sex;
                            let tdAge=tr.insertCell(4);
                            tdAge.innerHTML=obj.age;
                            let tdEmail=tr.insertCell(5);
                            tdEmail.innerHTML=obj.email;
                        }
                        table.appendChild(tBody);
                        document.body.appendChild(table);
                    }
                    else {//数据库查询为空
                        outNullTable("暂无内容");
                    }
                }
            }
        }
    </script>
</head>
<body>

<h5>学生详细信息一览表</h5>
<hr>
<ul>
    <!--跳转到学生信息添加-->
    <li><a href="addStudent.php">录入学生信息</a></li>
</ul>
<button onclick="location.href='./administratorMain.php'">返回首页</button>
<?php
//将条件查询框包含进来
require_once ("../../dao/StructDAO.php");
echo "<br>按学院查询";
require_once("../conditionIns.php");
?>
<table>
    <tr>
        <td>班级</td>
        <td>学号</td>
        <td>姓名</td>
        <td>年龄</td>
        <td>电子邮箱</td>
    </tr>
</table>
<table>

</table>
<!--
<input type="hidden" id="pageNum"/>
<div>
    <button onclick="setPage(0)">首页</button>
    <button onclick="setPage(1)">上一页</button>
    <button onclick="setPage(2)">下一页</button>
    <button onclick="setPage(3)">尾页</button>
</div>
-->

</body>
</html>
