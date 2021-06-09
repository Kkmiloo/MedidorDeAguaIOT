function iniciarSesion() {
  let correo = document.getElementById("correo");
  let password = document.getElementById("password");
  const mensajerError = document.getElementById("mensaje_error");

  if (correo.value == "usuario@gmail.com" && password.value == "usuario123") {
    console.log("correcto1");
    window.open("./seleccion.html", "_self");
  } else {
    console.log("noooo");
    mensajerError.style.visibility = "visible";
  }
  if (correo.value == "emcalicom" && password.value == "emcali123") {
    console.log("correcto2");
    window.open("./nodoEmcali.php", "_self");
  } else {
    console.log("noooo22");
    mensajerError.style.visibility = "visible";
  }
}
