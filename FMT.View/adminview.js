/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var s = document.getElementsByTagName('section');
//var c = ("color:red","color:pink");
//alert(s.length);
for (var i = 0; i < s.length; i++) {
    if (i%2 === 0) {
        s[i].setAttribute("style", "background:white");
    }
    if (i%2 === 1) {
        s[i].setAttribute("style", "background:grey");
    }
}