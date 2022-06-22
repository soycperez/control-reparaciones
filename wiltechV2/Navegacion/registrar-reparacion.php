<?php
include("../Consultas/verificar-sesion.php");
include("../Consultas/consultas-reparaciones.php");
include ("../Conexion/conexion.php");
//Establecemos conexión
session_start(); 
//Si las variables NO estan definidas el metodo ISSET() retorna FALSE
if(!isset($_SESSION["idEmpleado"],$_SESSION["usuario"], $_SESSION["cago"])){
    header("Location: ../vista-login.php");
}else{
    $cargo = $_SESSION["cago"]; 
    if($cargo != 'admin'){
        header("Location: ../vista-trabajador.php");
    }
}
$coneccion = conexion::conectar();
$reparaciones = new reparaciones(); 
//verificar::consulAdmin();
//Acedemos a las variables de sesión
$nombre = $_SESSION["nombre"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Reparación</title>
    <link rel="stylesheet" href="../css/nav.css">
    <!--Mi CSS-->
    <link rel="stylesheet" href="../css/reparacion.css">
    <!-- BOOTSTRAP y FONT AWESOME para el estilo de la pagina-->
    <link rel="stylesheet" href="../css/FontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/BoostrapV5/bootstrap.min.css">
</head>

<body>
    <!--Menu-->
    <header>
        <div class="logo">
            <a href="../vista-admin.php"><img src="../img/logo.png" alt=""></a>
            <h2>illTech México</h2>
        </div>
        <nav>
            <ul>
                <li><a href="./registrar-reparacion.php">Registrar reparación</a></li>
                <li><a href="../registrar-empleado.php">Registrar Trabajador</a></li>
                <li><a href="../Consultas/cerrar-sesion.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="contenedor">
        <div class="formulario">
            <form method="POST" id="formReparacion" action="" autocomplete="off" >
                <h5>Registrar Cliente e información del equipo</h5> <br>
                Nombre: <input type="text" id="nombreRepara" name="nombre">
                Marca: <input type="text" id="marcaRepara" name="marca">
                <br>Modelo: <input type="text" id="modeloRepara" name="modelo">
                Estado: <input type="text" name="estado" readonly value="Reparacion">
                <br>Observaciones: <br> <textarea id="comentariosRepara" maxlength="250" placeholder="Máximo 250 caracteres, contando espacios" name="comentarios" rows="10" cols="70"></textarea>
                Asignar reparación: <select id="asignarRepara" name="asignar">
                    <option value="0">Seleccione empleado</option>
                    <?php
                        $arrayEmpleados = $reparaciones->obtenerEmpleados($coneccion);
                        if (!empty($arrayEmpleados)) {
                            foreach($arrayEmpleados as $empleados){
                                echo '<option value="'.$empleados["idEmpleado"].'">'.$empleados["nombre"]." ".$empleados["apellidos"].'</option>';
                            }
                        }
                    ?>
                </select>
                <br>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-check-circle" aria-hidden="true"></i> Registrar Reparacion </button>
                <?php   
                if(!empty($_POST["nombre"]) && !empty($_POST["marca"]) && !empty($_POST["modelo"]) 
                    && !empty($_POST["estado"]) && !empty($_POST["comentarios"]) && !empty($_POST["asignar"])){
                    $reparaciones->registrarReparacion($coneccion, $_POST);
                }
                ?>
            </form>
        </div>
        <div class="tablaRerapaciones">
        <h5>Trabajadores con equipos en actual reparación</h5> <br>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Equipos en Reparación</th>
                </tr>
                <?php
                    $equiposReparacion = $reparaciones->listarReparacionesEmpleado($coneccion);
                    if (!empty($equiposReparacion)) {
                        foreach ($equiposReparacion as $reparacion) {
                ?>
                    <tr>
                        <td><?php echo $reparacion["idEmpleado"] ?></td>
                        <td><?php echo $reparacion["nombre"] ?></td>
                        <td><?php echo $reparacion["apellidos"] ?></td>
                        <td><?php echo $reparacion["equiposEnReparacion"] ?></td>
                    </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>


    <!-- JQUERY, BOOSTRAP y mis JS-->
    <script src="../js/validaciones.js"></script>
    <script src="js/BoostrapV5Js/jquery-3.6.0.min.js"></script>
    <script src="./js/BoostrapV5Js/bootstrap.min.js"></script>
</body>

</html>