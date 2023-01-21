const table = document.createElement('table');
let count = 0;
function tablemaker() {
    if(document.getElementById('table')){
        alert("You have already created a table");
    }
    else{
        table.innerHTML = "<table><tr><td>NUMBER</td><td>NAME</td><td style='text-align: center'>INFO</td></tr></table>";
        table.setAttribute('id', 'table');
        table.setAttribute('align', 'center');
        document.body.append(table);
        count+=1;
    }
}

function add(){
    let a = table.insertRow();
    a.insertCell().append(count);
    a.insertCell().append("name");
    a.insertCell().append("some text about");
    count++;
}
function del(){
    if(document.getElementById('a').value===""){
        alert("Enter the number");
    }
    element_for_del = document.getElementById('a').value;
    try {
        table.deleteRow(element_for_del);
        alert("Row is successfully deleted");
    }
    catch (e){
        alert("Wrong line number");
    }
}