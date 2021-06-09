(function(){

var alertaElement1 = document.getElementById('circulo1').getElementsByClassName("c1");
var alarma1 =document.getElementById("a1");

var alertaElement2 = document.getElementById('circulo1').getElementsByClassName("c2");
var alarma2 =document.getElementById("a2");

var alertaElement3 = document.getElementById('circulo1').getElementsByClassName("c3");
var alarma3 =document.getElementById("a3");

if(alarma1.innerHTML==' 1 '){
    alertaElement1.style.background= 'red';
}else{
    alertaElement1.style.background= '#8CC657';
}

if(alarma2.innerHTML==' 1 '){
    alertaElement2.style.background= 'red';
}else{
    alertaElement2.style.background= '#8CC657';
}

if(alarma3.innerHTML==' 1 '){
    alertaElement3.style.background= 'red';
}else{
    alertaElement3.style.background= '#8CC657';
}




})();