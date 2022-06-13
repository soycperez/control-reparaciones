<?php
    //iniamos sesión registrada
    session_start(); 
    //Si las variables NO estan definidas el metodo ISSET() retorna FALSE
    if(!isset($_SESSION["idEmpleado"],$_SESSION["usuario"], $_SESSION["cago"])){
        header("Location: ./vista-login.php");
    }else{
        $cargo = $_SESSION["cago"]; 
        if($cargo != 'admin'){
            header("Location: ./trabajador.html");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pagina para admin</h1>
    <a href="./Consultas/cerrarSesion.php">Cerrar Sesión</a>
</body>
</html>