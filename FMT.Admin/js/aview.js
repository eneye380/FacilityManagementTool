/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function show(obj) {
    display(obj.value);
}

function display(value) {
    
    return;
    alert(value);
    var url = '/FMT.Admin/pages/complaint_aview.php';
    var params = "idparam=" + value;
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            
            //var x = String(xmlhttp.responseText);
            
            //x = x.replace(/\s+/g, '');
            
            //document.getElementById("body").innerHTML = x;
            

        }
        
    };

    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", params.length);
    xmlhttp.setRequestHeader("Connection", "close");
    
    xmlhttp.send(params);
    
}

