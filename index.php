<!DOCTYPE html>
<html>
 <head>
 <title>Proyecto IoT</title>
 </head>
 <body>
 <?php
 if(isset($_POST['enviar'])){
 $login = $_POST['login'];
 $password = $_POST['pass'];
 if ($login=="admin" && $password=="1234"){
 header("Location: seleccion.html");
 }
 else{
 header("Location: index.php");
 }
 }
 else{
 ?>
 <br>
 <h1>PROYECTO IoT</h1>
 <h2>INGRESO</h2>
 <form action="index.php" method="POST">
 LOGIN: <br>
 <input type="text" name="login" width="50"><br><br>
 PASSWORD: <br>
 <input type="password" name="pass" width="50"><br><br>
 <input type="submit" name="enviar" value="ENVIAR">
 </form>
 <?php } ?>
 </body>
</html>
