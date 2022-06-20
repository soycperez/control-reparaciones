<?php
include("./Consultas/verificar-sesion.php");
include("./Consultas/consultas-admin.php");
verificar::consulAdmin();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/nav.css">
    <!--Mi CSS-->
    <link rel="stylesheet" href="./css/registrar.css">
    <!-- BOOTSTRAP y FONT AWESOME para el estilo de la pagina-->
    <link rel="stylesheet" href="./css/FontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/BoostrapV5/bootstrap.min.css">
</head>

<body>
    <!--Menu-->
    <header>
        <div class="logo">
            <a href="vista-admin.php"><img src="./img/logo.png" alt=""></a>
            <h2>illTech México</h2>
        </div>
        <nav>
            <ul>
            <li><a href="./Navegacion/registrar-reparacion.php">Registrar reparación</a></li>
                <li><a href="registrar-empleado.php">Registrar Trabajador</a></li>
                <li><a href="./Consultas/cerrar-sesion.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <!--Sección de registro-->
    <?php
        //Recuperamos ID
        if (!isset($_GET['id'])) {
            echo "<h1> ID no definida </h1>";
        } else {
            $idEmpleado = $_GET['id'];
            $nombre = $_GET['nombre'];
            $apellidos = $_GET['apellidos'];
            $usuario = $_GET['usuario'];
            $cargo = $_GET['cargo'];
        }
        ?>
    <section>
        <h3>Editar Empleado</h3>
        <!-- Fomulario de Registro -->
        <div class="modal-dialog">
            <div class="modal-content">
                <br>
                <form method="post" id="formLogin" action="">
                    <b><label>ID:</label></b>
                    <input type="text" id="nombre" name="idEmpleado" readonly value="<?php echo $idEmpleado; ?>">
                    <br>
                    <b><label>Nombre:</label></b>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                    <br>
                    <b><label>Apellidos:</label></b>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>">
                    <br>
                    <b><label>Usuario:</label></b>
                    <input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>">
                    <br>
                    <b><label>Cargo:</label></b>
                    <input type="text" id="contrasenia" readonly name="cargo" value="<?php if($cargo == 'admin') {echo "Administrador";}else echo "Tecnico"; ?>">
                    <br>
                    <button class="btn btn-primary mt-3" type="submit"><i class="fa fa-paper-plane"> Editar Empleado</i></button>
                    <br>
                    <br>
                    <?php
                        consultasAdmin::updateEmpleado();
                    ?>
                </form>
            </div>
        </div>
        <!-- FIN Fomulario de Registro -->

        <!-- JQUERY, BOOSTRAP y mis JS-->
        <script src="./js/validaciones.js"></script>
        <script src="js/BoostrapV5Js/jquery-3.6.0.min.js"></script>
        <script src="./js/BoostrapV5Js/bootstrap.min.js"></script>
</body>

</html>