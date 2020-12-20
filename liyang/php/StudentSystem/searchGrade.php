<?php require_once("../head.php");
echo <<<OUT
<a href="#" onclick="location.href='studentMain.php'">返回主页</a>>>>课程成绩查询系统
OUT;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>成绩查询系统</title>
    <!--引入的js文件-->
    <script src="../../js/checkUpdate.js" type="text/javascript" rel="script"></script>
    <script src="../../js/AjaxMain/BaseAjaxUtil.js" type="text/javascript" rel="script"></script>
    <script src="../../js/BaseJs/outNullTable.js" type="text/javascript" rel="script"></script>
    <script>
        function run() {
            XMLHttp=getXMLHttpRequestObject()
            //通过js获取选择的学院的编号
            let term=document.getElementById('ter').value;
            //编写请求处理的URL
            let url="../ajax_searchGrade_student.php?trm="+term+""+"&page="+Math.random();//传递学院ID以及页码
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
                            //分析构造出一个js对象
                            let grade=JSON.parse(one);
                            let tr=tBody.insertRow(i);
                            let tdClassID=tr.insertCell(0);
                            tdClassID.innerHTML=grade.courseID;
                            let tdStudentID=tr.insertCell(1);
                            tdStudentID.innerHTML=grade.courseName;
                            let tdStudentName=tr.insertCell(2);
                            tdStudentName.innerHTML=grade.credit;
                            let tdGender=tr.insertCell(3);
                            tdGender.innerHTML=grade.coursePeriod;
                            let tdAge=tr.insertCell(4);
                            tdAge.innerHTML=grade.term;
                            let tdEmail=tr.insertCell(5);
                            tdEmail.innerHTML=grade.grade;
                        }
                        table.appendChild(tBody);
                        document.body.appendChild(table);
                    }
                    else {//数据库查询为空
                        outNullTable("暂无课程成绩");
                    }
                }
            }
        }


    </script>
</head>
<body>
<hr>
<div class="form">
    <label>按学期查询
        <select  id="ter" name="term"  onchange="run()">
            <option value="0">全部成绩</option>
            <?php
           for($i=1;$i<9;$i++){
               echo "<option value=\"$i\">第 $i 学期</option>";
           }
            ?>
        </select>
    </label>
    <table>
        <tr>
            <td>课程号</td>
            <td>课程名</td>
            <td>学分</td>
            <td>学时</td>
            <td>上课学期</td>
            <td>成绩</td>
        </tr>
    </table>
    <!--用来显示成绩-->
    <table></table>
</div>
</body>
</html>
