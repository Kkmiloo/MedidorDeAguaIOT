//CÓDIGO PARA COMPROBAR INICIO DE SESIÓN
function iniciarSesion() {
  //Obtengo lo que el usuario ha escrito en correo y contraseña
  let correo = document.getElementById("correo");
  let password = document.getElementById("password");
  //Obtengo el mensaje de error también
  const mensajerError = document.getElementById("mensaje_error");

  //Si el RESIDENTE ingresa las credenciales válidas
  if (correo.value == "usuario@gmail.com" && password.value == "usuario123") {
    console.log("correcto1");
    //Abra la nueva página que es /seleccion.html
    window.open("./seleccion.html", "_self");
  } else {
    //Si las credenciales no son válidas
    console.log("noooo");
    //Imprima mensaje de error
    mensajerError.style.visibility = "visible";
  }
  //Si la EMPRESA ingresa las credenciales válidas
  if (correo.value == "emcalicom" && password.value == "emcali123") {
    console.log("correcto2");
    //Abra la nueva página que es nodoEmcali.php
    window.open("./nodoEmcali.php", "_self");
  } else {
    console.log("noooo22");
    //Imprima mensaje de error
    mensajerError.style.visibility = "visible";
  }
}
