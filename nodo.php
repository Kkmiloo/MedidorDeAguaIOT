<!--PÁGINA QUE SE LE MUESTRA AL USUARIO CUANDO SELECCIONA UN DISPOSITIVO-->
<html>

<head>
    <title>Medidor de agua</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!--Código de estilos para la página-->
    <link rel="stylesheet" href="./css/nodo.css">

</head>

<body>
    <?php
 //Se obtienen valores que pusimos antes en los botones   
 $nodo = $_POST["nodo"];
 $token= $_POST["token"];
 ?>
    <!--Header de la página-->
    <header>
        <nav class="navbar navbar-light bg-light">
            <!--Botón para volver-->
            <a class="navbar-brand mb-0 h1" href="seleccion.html">Volver</a>
            <?php  
            echo "<h3> </h3>";
            ?>
            <p id='nombrePagina'> Medidor de agua</p>
        </nav>
    </header>

    <div class="row">
        <div>
            <table class="table">
                <thead class="thead-light">
                    <!--Creo tabla con las columnas caudal y fecha-->
                    <tr>
                        <th scope="col">Caudal</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
    //Método que llama a la API
    //Envio nodo, variable y el token correspondiente
   function llamarAPI($nodo,$var,$token){
    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=$token";//verificar 
    //Cambio zona horaria
    date_default_timezone_set('America/Bogota');
    //Inicio la conexión
    $curl = curl_init($url_rest);
    //Parámetros de conexión, la segunda me indica que puedo guardar los datos en una variable
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   //Guardo en la variable respuesta lo que obtenga de Ubidots
    $respuesta = curl_exec($curl);
    //Si no hay datos, cierre la conexión
    if($respuesta===false){
    curl_close($curl);
    die ("Error...");
    }    
    //Guarde en la variable resp, la decodificación del json
    $resp = json_decode($respuesta);   
    //En el arreglo results guarde la respuesta
    $result = $resp -> results;

    //Si una variable se llama alertaPH
    if($var == "alertaph" ){
        //J va a obtener el primer valor, es decir, obtenga la última alerta generada
        $j = $result[0];
        //Guarde en la variable valor esa alerta
        $valor = $j -> value;
        //Coloquela en la tabla
        echo "<p id='a1'> $valor </p>" ;
        //Ejecute el script nodo.js, es para el círculo, cambiar color
        echo "<script src='./nodo.js'></script>";
    }else{
        //de resto
        for ($i=0; $i<10; $i++){
            //Llene la tabla con los datos que va obteniendo de caudal
            $j = $result[$i];
            $valor = $j -> value;
            $time = $j -> timestamp;           
            $fecha = date('d-m-Y H:i:s',$time/1000);
            echo "<tr><td>$valor</td><td>$fecha</td></tr>";
        }
    }
 }

 $var = "caudal";
 llamarAPI($nodo,$var,$token);  
   ?>
                </tbody>
            </table>
        </div>

        <div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Proximidad</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
            $var= "proximidad";
            llamarAPI($nodo,$var,$token);
          ?>
                </tbody>
            </table>
        </div>

        <div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">PH</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
            $var= "ph";
            llamarAPI($nodo,$var,$token);
          ?>
                </tbody>
            </table>
        </div>

        <div >
            <h2>Alerta<br> PH</h2>
        <div id="circulo1">
        <?php 
                $var= "alertaph";
                llamarAPI($nodo,$var,$token);                     
        ?>         
            </script>
        </div>
        </div>

    </div>

</body>

</html>