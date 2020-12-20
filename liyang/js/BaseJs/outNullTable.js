function outNullTable(message){
    //message提示信息
    let table=document.getElementsByTagName("table")[1];
    if(table) table.parentNode.removeChild(table);
    let tBody=document.createElement("tBody");
    table=document.createElement("table");
    let tr=table.insertRow(0);
    let td=tr.insertCell(0);
    table.appendChild(tBody);
    td.innerText=message;
    table.appendChild(tBody);
    document.body.appendChild(table);
}