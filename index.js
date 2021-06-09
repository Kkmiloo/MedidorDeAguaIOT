function iniciarSesion(){
    let correo = document.getElementById("correo");
    let password = document.getElementById("password");
    const mensajerError = document.getElementById("mensaje_error");

    if(correo.value == "usuario@gmail.com" && password.value == "usuario123"){
        console.log("correcto");
        window.open("./seleccion.html", "_self");
    }else if(correo.value == "emcali@gmail.com" && password.value == "emcali123"){
        console.log("correcto");
        window.open("./seleccion.html", "_self");
    }else{
        console.log("noooo");
        mensajerError.style.visibility = "visible";
    }
}