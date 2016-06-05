/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function facilitatorSU(form){
    
    var name = form.fname.value;
    var email = form.femail.value;
    var password1 = form.fpassword1.value;
    var password2 = form.fpassword2.value;
    
    var text = "Name: "+name;
    text += "\nEmail: "+email;
    text += "\nPassword1: "+password1;
    text += "\nPassword2: "+password2;
    //alert(text);
    var fail = "";
    fail += checkName(name)+checkEmail(email)+checkPassword(password1)+checkPassword(password2);
    if(fail===""){
        //alert(text);
        return true;
    }else{
        //alert(fail);
        return false;
    }
    
}
function checkName(name){
    if(name===""){
        document.getElementById('namehint').innerHTML = "fill in name field";
        document.getElementById('namehint').setAttribute("style","color:red");
        return "fill in name field\n";
    }else{
        return "";
    }
}
function checkEmail(email){
    if(email===""){
        document.getElementById('emailhint').innerHTML = "fill in email field";
        document.getElementById('emailhint').setAttribute('style', 'color:red');
        return "fill in email field\n";
    }else{
        return "";
    }
}
function checkPassword(password){
    if(password===""){
        document.getElementById('passwordhint').innerHTML = "fill in password field";
        document.getElementById('passwordhint').setAttribute('style', 'color:red');
        return "fill in password field\n";
    }else if(password.length < 6){
        document.getElementById('passwordhint').innerHTML = "password must be six character long or more";
        document.getElementById('passwordhint').setAttribute('style', 'color:red');
        return "password must be six character long or more";
    }else{
        return "";
    }
}