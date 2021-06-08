  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Can</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./style/index.css">
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: #4A9FFF;">
        <div class="container-fluid">
          <a style="color: #FFFFFF; font-size: 2.5em; margin-left: 10px;" class="navbar-brand" href="index.html">
            <img style="margin-right: 10px;" src="https://images.vexels.com/media/users/3/144928/isolated/preview/ebbccaf76f41f7d83e45a42974cfcd87-dog-illustration-by-vexels.png" 
            alt="" width="50" height="50" class="d-inline-block align-text-top">
            Health Can
          </a>
        </div>
      </nav>
      <div class="container col-3 text-center" style="margin-top: 60px;">
            <img class="mb-4" src="https://images.vexels.com/media/users/3/144928/isolated/preview/ebbccaf76f41f7d83e45a42974cfcd87-dog-illustration-by-vexels.png" 
            alt="" width="92" height="92">
            <h1 class="h3 mb-3 fw-normal">Inicia sesión</h1>
            <div class="form-floating">
              <input type="email" class="form-control" id="correo" placeholder="name@example.com">
              <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="password" placeholder="Contraseña">
              <label for="floatingPassword">Contraseña</label>
            </div>
        
            <button onclick="iniciarSesion()" style="margin-top: 30px; margin-bottom: 15px;" class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
            <p id="mensaje_error" style="color:red; font-weight: bold; visibility:hidden;">Las credenciales son incorrectas</p>
            <p class="mt-5 mb-3 text-muted">&copy; Health Can - 2021</p>
      </div>
      
    <script src="./index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
    crossorigin="anonymous"></script>
</body>
</html>