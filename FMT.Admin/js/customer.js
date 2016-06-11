/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */






function click_submit(form){
    
    //alert(form.btype.value);
    return true;
    
}

function click_next(form){
    var x = document.getElementById('success');
    x.innerHTML = "";
    var name = form.bname.value;
    var type = form.btype.value;
    var addr = form.baddress.value;
    var desc = form.bdesc.value;
    
    var fail = "";
    
    fail += validateName(name) + validateType(type) + validateAddr(addr) + validateDesc(desc);
    
    if(fail===""){
        next();
    }else{
        x.setAttribute('style','color:red');
        x.innerHTML = fail;
        //alert(fail);
    }
    
}
function validateName(value){
    if(value === ""){
        return "\nEnter building name, ";
    }
    else{
        return "";
    }
}
function validateAddr(value){
    if(value === ""){
        return "\nEnter building address, ";
    }else{
        return "";
    }
}
function validateType(value){
    if(value === ""){
        return "\nSelect building type, ";
    }else{
        return "";
    }
}
function validateDesc(value){
    if(value === ""){
        return "\nEnter building description, ";
    }else{
        return "";
    }
}
function click_back(){
    
    back();
}
var next = function(){ 
    page1Hide();
    page2Show();    
};
var back = function(){ 
    page2Hide();
    page1Show();    
};
function page1Hide(){
    var page_hide = document.getElementsByClassName('page-1');
    for(var i=0;i<page_hide.length;i++){
        page_hide[i].setAttribute('style','display:none');
    }
}
function page2Hide(){
    var page_hide = document.getElementsByClassName('page-2');
    for(var i=0;i<page_hide.length;i++){
        page_hide[i].setAttribute('style','display:none');
    }
}
function page1Show(){
    var page_show = document.getElementsByClassName('page-1');
    for(var i=0;i<page_show.length;i++){
        page_show[i].setAttribute('style','display:block');
    }
}
function page2Show(){
    var page_show = document.getElementsByClassName('page-2');
    for(var i=0;i<page_show.length;i++){
        page_show[i].setAttribute('style','display:block');
    }
}