<?php
include("../Consultas/verificar-sesion.php");
include ("../Conexion/conexion.php");
include("../Consultas/consultas-empleado.php");
//Veficiamos empleado
//verificar::consulEmpleado();
//iniamos sesión registrada
session_start(); 
//Si las variables NO estan definidas el metodo ISSET() retorna FALSE
if(!isset($_SESSION["idEmpleado"],$_SESSION["usuario"], $_SESSION["cago"])){
    header("Location: ../vista-login.php");
}else{
    $cargo = $_SESSION["cago"]; 
    if($cargo != 'tecnico'){
        header("Location: ../vista-admin.php");
    }
}
//Hacemos conección
$coneccion = conexion::conectar();
//Recuperamos datos de la sesión
$nombre = $_SESSION["nombre"];
$idEmpleado = $_SESSION["idEmpleado"];

//Instaciamos la clase donde estaran los metodos del empleado
$consultasEmpleado = new consultasEmpleados(); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/trabajador.css">
    <link rel="stylesheet" href="../css/nav.css">
    <!-- BOOTSTRAP y FONT AWESOME para el estilo de la pagina-->
    <link rel="stylesheet" href="../css/FontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/BoostrapV5/bootstrap.min.css">
    <title>Historial Trabajador</title>
</head>

<body>
    <header>
        <div class="logo">
        <a href="../vista-admin.php"><img src="../img/logo.png" alt=""></a>
            <h2>illTech México</h2>
        </div>
        <nav>
            <ul>
                <li><a href="./historial-trabajador.php">Consular Historial</a></li>
                <li><a href="../Consultas/cerrar-sesion.php" class="cerrarSesios">Cerrar sesión</a></li>
            </ul>
        </nav>

    </header>

    <section>
        <div class="encabezadoTabla">
            <h4>
                Empleado: <?php print_r($nombre); ?> <br>con Identificador: <?php print_r($idEmpleado); ?>
            </h4>
        </div>

        <hr>
        <h3>Equipos en actual reparación</h3>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Cliente</th>
                <th>ID Equipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Observaciones</th>
                <th>Estado</th>
            </tr>
            <?php
            
            $equiposEnReparacion = $consultasEmpleado->verHistorial($idEmpleado, $coneccion);
            if (!empty($equiposEnReparacion)) {
                foreach ($equiposEnReparacion as $reparacion) {

            ?>
                    <tr>
                        <td><?php echo $reparacion["idEmpleado"] ?></td>
                        <td><?php echo $reparacion["nombre"] . " " . $reparacion["apellidos"]  ?></td>
                        <td><?php echo $reparacion["cNombre"] ?></td>
                        <td><?php echo $reparacion["idEquipo"] ?></td>
                        <td><?php echo $reparacion["marca"] ?></td>
                        <td><?php echo $reparacion["modelo"] ?></td>
                        <td><?php echo $reparacion["observaciones"] ?></td>
                        <td>                       
                            <?php
                            $estado = $reparacion["estado"];
                            if ($estado == 1) echo "<button> Reparación </button>";
                            else echo '<button type="text" class="btn btn-success preparado"> Reparado </button>';
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