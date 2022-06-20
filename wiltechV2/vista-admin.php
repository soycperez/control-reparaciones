<?php
include("./Consultas/verificar-sesion.php");
verificar::consulAdmin();
//Acedemos a las variables de sesión
$nombre = $_SESSION["nombre"];
$idEmpleado = $_SESSION["idEmpleado"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/admin.css">
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

    <!--Sección del inicio-->
    <section>
        <div class="encabezadoTabla">
            <h4>
                Bienvendio <?php print_r($nombre); ?> ID: <?php print_r($idEmpleado); ?>
            </h4>
        </div>

        <hr>
        <h3>Equipos en actual reparación</h3>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Cliente</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Observaciones</th>
                <th>Estado</th>
            </tr>
            <?php
            include("./Consultas/consultas-admin.php");
            $equiposReparacion = consultasAdmin::reparacionesActivas();
            if (!empty($equiposReparacion)) {
                foreach ($equiposReparacion as $reparacion) {

            ?>
                    <tr>
                        <td><?php echo $reparacion["idEmpleado"] ?></td>
                        <td><?php echo $reparacion["eNombre"] . " " . $reparacion["apellidos"]  ?></td>
                        <td><?php echo $reparacion["cNombre"] ?></td>
                        <td><?php echo $reparacion["marca"] ?></td>
                        <td><?php echo $reparacion["modelo"] ?></td>
                        <td><?php echo $reparacion["observaciones"] ?></td>
                        <td>
                            <?php
                            $estado = $reparacion["estado"];
                            if ($estado == 1) echo "Reparación";
                            else echo "Reparado";

                            ?>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <?php //include("./Bloques/form-empleado.php"); 
        ?>
    </section>

    <!-- JQUERY y BOOSTRAP JS-->
    <script src="js/BoostrapV5Js/jquery-3.6.0.min.js"></script>
    <script src="./js/BoostrapV5Js/bootstrap.min.js"></script>
</body>

</html>