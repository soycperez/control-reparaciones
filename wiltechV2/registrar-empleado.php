<?php
include("./Consultas/verificar-sesion.php");
include("./Consultas/consultas-admin.php");

verificar::consulAdmin();
//Acedemos a las variables de sesión
$nombre = $_SESSION["nombre"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/nav.css">
    <!--Mi CSS-->
    <link rel="stylesheet" href="css/registrar.css">
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
    <section>
        <h3>Registrar Empleado</h3>
        <!-- Fomulario de Registro -->
        <div class="modal-dialog">
            <div class="modal-content">
                <br>
                <form method="post" id="formLogin" action="">
                    <b><label>Nombre:</label></b>
                    <input type="text" id="nombre" name="nombre">
                    <br>
                    <b><label>Apellidos:</label></b>
                    <input type="text" id="apellidos" name="apellidos">
                    <br>
                    <b><label>Cargo:</label></b>
                    <select id="cargo" name="cargo">
                        <option value="tecnico">Tecnico</option>
                        <option value="admin">Administrador</option>
                    </select>
                    <br>
                    <b><label>Usuario:</label></b>
                    <input type="text" id="usuario" name="usuario">
                    <br>
                    <b><label>Contraseña:</label></b>
                    <input type="password" id="contrasenia" name="contrasenia">
                    <br>
                    <button class="btn btn-primary mt-3" type="submit"><i class="fa fa-sign-in"> Registrar</i></button>
                    <br>
                    <br>
                    <?php
                    consultasAdmin::registrarEmpleado();
                    ?>
                </form>
            </div>
        </div>
        <!-- FIN Fomulario de Registro -->

        <!-- CONSULTA DE EMPLEADOS REGISTRADOS -->
        <hr>
        <h3>Empleados Registrados</h3>
        <div class="tablaEmpleados">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
                <?php
                $equiposReparacion = consultasAdmin::empleadosRegistrados();
                if (!empty($equiposReparacion)) {
                    foreach ($equiposReparacion as $reparacion) {
                ?>
                        <tr>
                            <td><?php echo $reparacion["idEmpleado"] ?></td>
                            <td><?php echo $reparacion["nombre"] ?></td>
                            <td><?php echo $reparacion["apellidos"] ?></td>
                            <td><?php echo $reparacion["usuario"] ?></td>
                            <td><?php echo $reparacion["cargo"] ?></td>
                            <td>
                                <b><a class="btnEditar" href="editar-empleado.php?id=<?php echo $reparacion["idEmpleado"] . "&nombre=" . $reparacion["nombre"]
                                                                                            . "&apellidos=" . $reparacion["apellidos"] . "&usuario=" . $reparacion["usuario"] . "&cargo=" . $reparacion["cargo"] ?>">Editar</a></b>
                                <!--<b><a class="btnEliminar" href="./Consultas/deleteEmpleado.php?id=<?php //echo $reparacion["idUsuario"] 
                                                                                                        ?>" >Eliminar</a></b>-->
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
        <!--FIN  CONSULTA DE EMPLEADOS REGISTRADOS -->
    </section>
    <!-- JQUERY, BOOSTRAP y mis JS-->
    <script src="./js/validaciones.js"></script>
    <script src="js/BoostrapV5Js/jquery-3.6.0.min.js"></script>
    <script src="./js/BoostrapV5Js/bootstrap.min.js"></script>
</body>

</html>