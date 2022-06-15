<?php
    include("./Consultas/verificar-sesion.php");
    verificar::consulAdmin();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/nav.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="./img/logo.png" alt="">
            <h2>illTech México</h2>
        </div>
        <nav>
            <ul>
                <li><a href="#">Registrar reparación</a></li>
                <li><a href="#">Registrar Trabajador</a></li>
                <li><a href="./Consultas/cerrar-sesion.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h1>Pagina para admin</h1>
        <?php //include("./Form/form-empleado.php"); ?>
    </section>
    
</body>
</html>