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
 //Método de llamar a la API  parecido
 function llamarAPI($nodo,$var,$token){
     //Creo contador
     $cont= 1;
    //URL con el nodo y variable y token que yo le asigne 
    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=$token";//verificar 
    //Cambio zona horaria
    date_default_timezone_set('America/Bogota');
    //Inicio conexión
    $curl = curl_init($url_rest);
    //Defino parámetros, que se pueda guardar en una variable
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //Ejecuto dicha conexión
    $respuesta = curl_exec($curl);
    
    //Si no hay datos, cierre esa conexión
    if($respuesta===false){
    curl_close($curl);
    die ("Error...");
    }    
    //Si hay, guardelos en la variable resp, y luego en result
    $resp = json_decode($respuesta);   
    $result = $resp -> results;

    //Si la variable es alerta caudal, obtenga solo la última
    if($var == "alertacaudal" ){
        $j = $result[0];
        $valor = $j -> value;
        echo "<p id='a$cont'> $valor </p>" ;
        //Aumente el contador (para organización de tablas)
        $cont= $cont +1;
        
    }else{
        //Llene la tabla con los valores de la variable
        for ($i=0; $i<10; $i++){
            $j = $result[$i];
            $valor = $j -> value;
            $time = $j -> timestamp;           
            $fecha = date('d-m-Y H:i:s',$time/1000);
            echo "<tr><td>$valor</td><td>$fecha</td></tr>";
        }
    }
 }
 ?>
    <!--Header de la página-->
    <header>
        <nav class="navbar navbar-light bg-light">
            <!--Botón de volver-->
            <a class="navbar-brand mb-0 h1" href="seleccion.html">Volver</a>
            <?php  
            
            echo "<h3> </h3>";
            ?>
            <p id='nombrePagina'> Medidor de agua</p>
        </nav>
    </header>

    <div class="row">
        <div>
            <!--Tabla de caudal lavaplatos-->
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Caudal Lavaplatos (L/min)</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    //Igualo los datos a los que conozco
                    $nodo= "lavaplatos"; 
                    $var = "caudal";
                    $token ="BBFF-X5hI0odQkY8bPyWQQgDl7mKSJNQN4D";
                    //Ejecuto el método de llamar a la API
                    llamarAPI($nodo,$var,$token);  
   ?>
                </tbody>
            </table>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Caudal Ducha</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                    $nodo= "ducha"; 
                    $var = "caudal";
                    $token ="BBFF-6Ez72888PWNL7SIs3xe2RWrOZlDuVc";
                    llamarAPI($nodo,$var,$token);  
   ?>
                </tbody>
            </table>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Caudal lavamanos</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                    $nodo= "lavamanos"; 
                    $var = "caudal";
                    $token ="BBFF-MuthHA0em5NagYaaZbFscldqQoLXU7";
                    llamarAPI($nodo,$var,$token);  
   ?>
                </tbody>
            </table>
        </div>

        <!-- aqui hay otra tabla-->
        <div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Proximidad Lavaplatos</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
           $nodo= "lavaplatos"; 
           $var = "proximidad";
           $token ="BBFF-X5hI0odQkY8bPyWQQgDl7mKSJNQN4D";
            llamarAPI($nodo,$var,$token);
          ?>
                </tbody>
            </table>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Proximidad Ducha</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
            $nodo= "ducha"; 
            $var = "proximidad";
            $token ="BBFF-6Ez72888PWNL7SIs3xe2RWrOZlDuVc";
            llamarAPI($nodo,$var,$token);
          ?>
                </tbody>
            </table>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Proximidad Lavamanos</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
            $nodo= "lavamanos"; 
            $var = "proximidad";
            $token ="BBFF-MuthHA0em5NagYaaZbFscldqQoLXU7";
            llamarAPI($nodo,$var,$token);
          ?>
                </tbody>
            </table>
        </div>
        <!-- aqui hay otra tabla-->
        <div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">PH Lavaplatos</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $nodo= "lavaplatos"; 
                    $var = "ph";
                    $token ="BBFF-X5hI0odQkY8bPyWQQgDl7mKSJNQN4D";
                    llamarAPI($nodo,$var,$token);  
   ?>
                </tbody>
            </table>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">PH Ducha</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                    $nodo= "ducha"; 
                    $var = "ph";
                    $token ="BBFF-6Ez72888PWNL7SIs3xe2RWrOZlDuVc";
                    llamarAPI($nodo,$var,$token);  
   ?>
                </tbody>
            </table>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">PH Lavamanos</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
            $nodo= "lavamanos"; 
            $var = "ph";
            $token ="BBFF-MuthHA0em5NagYaaZbFscldqQoLXU7";
            llamarAPI($nodo,$var,$token);
          ?>
                </tbody>
            </table>
        </div>
        <div>
            <h2>Alerta<br> Caudal lavaplatos</h2>
            <div id="circulo1" class="c1">
                <?php 
                 $nodo= "lavaplatos"; 
                 $var= "alertacaudal";
                 $token ="BBFF-X5hI0odQkY8bPyWQQgDl7mKSJNQN4D";
                llamarAPI($nodo,$var,$token);                     
                ?>
            </div>

            <h2>Alerta<br> Caudal ducha</h2>
            <div id="circulo1" class="c2">
                <?php 
                 $nodo= "ducha";            
                 $var= "alertacaudal";
                 $token ="BBFF-6Ez72888PWNL7SIs3xe2RWrOZlDuVc";
              
                llamarAPI($nodo,$var,$token);                     
                ?>
            </div>
            
            <h2>Alerta<br> Caudal lavamanos</h2>
            <div id="circulo1" class="c3">
                <?php 
                   $nodo= "lavamanos";        
                   $var= "alertacaudal";           
                   $token ="BBFF-MuthHA0em5NagYaaZbFscldqQoLXU7";
               
                llamarAPI($nodo,$var,$token);                     
                ?>               
            </div>           
        </div>
        <script src='./nodo.js'></script>
</body>

</html>