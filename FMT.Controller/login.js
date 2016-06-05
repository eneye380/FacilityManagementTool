/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function entry(form) {
    //alert("p4");
    err={};
    var err = document.getElementsByClassName("error");
    for(var i = 0;i<err.length;i++){
        err[i].innerHTML = "";
    }
    var error="";
    if (form.fusername.value === "") {
        error = "you forgot to enter your username<br>";
        //document.getElementById("hint").innerHTML = "please enter username";
        //return false;
    }if (form.fpassword.value === "") {
        error += "you forgot to enter your password";
        //document.getElementById("hint").innerHTML = "please enter password";
        //return false;
    }
    if(error!==""){
        document.getElementById("hint").innerHTML = error;
        return false;
    }
    var url = '/FMT.View/login.php';
        var params = "password=" + form.fpassword.value + "&username=" + form.fusername.value;
        //alert(form.fpassword.value);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                var x = String(xmlhttp.responseText);
                x = x.replace(/\s+/g, '');
                //alert(x);
                console.log(x === 'ok');
                if (x === 'ok') {
                    location.href = '/FMT.Admin/pages/adminfm.php';
                    //location.href = '/FMT.View/buildingform.php';
                } else if (x === 'notok') {
                    document.getElementById("hint").innerHTML = 'email or password incorrect, please try again or register';
                } else {
                    document.getElementById("hint").innerHTML = x;
                }
            }
        };
        
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", params.length);
        xmlhttp.setRequestHeader("Connection", "close");
        
        xmlhttp.send(params);
        return false;
}