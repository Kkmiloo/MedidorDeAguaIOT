//Método para cambiar el color
//Función autollamable, se ejecuta apenas se llame el script
(function(){
    console.log("ENTROOOO");

    //Obtengo contenedor de la variable de la alerta
    var alertaElement2 = document.getElementById("circulo1");
    //Obtengo el párrafo que tiene el valor
    var alarma1 =document.getElementById("a1");
    
    //Si el valor es 1, coloquelo rojo, si no, verde
    if(alarma1.innerHTML==' 1 '){
        alertaElement2.style.background= 'red';
    }else{
        alertaElement2.style.background= '#8CC657';
    }
})();