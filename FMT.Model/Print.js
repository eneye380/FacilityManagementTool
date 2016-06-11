/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//alert('status');
var egg = 'abdulmumin';
var Myname = function(name){
    this.name = name;
    this.print = print;
};
function print(){
    return this.name;
}
var a = new Myname(egg);
//alert(a.print());
console.log(a.print());

