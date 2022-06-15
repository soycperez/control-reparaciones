<?php
    include("./Consultas/verificar-sesion.php");
    verificar::consulEmpleado();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav.css">
    <title>Document</title>
</head>
<body>
<header>
        <div class="logo">
            <img src="./img/logo.png" alt="">
            <h2>illTech México</h2>
        </div>
        <nav>
            <ul>
                <li><a href="#">Consular Historial</a></li>
                <li><a href="./Consultas/cerrar-sesion.php" class="cerrarSesios">Cerrar sesión</a></li>
            </ul>
        </nav>

    </header>
    <h1>Vista para trabajador</h1>
</body>
</html>