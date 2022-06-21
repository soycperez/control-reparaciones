<?php
    include ("../Conexion/conexion.php");
    include("../Consultas/consultas-empleado.php");
    
    if(isset($_GET["idEquipo"])){
        $coneccion = conexion::conectar();
        echo "<h1> entra</h1>";
        $idEquipo = $_GET["idEquipo"];
        echo $idEquipo;
        //Instaciamos la clase donde estaran los metodos del empleado
        $consultasEmpleado = new consultasEmpleados(); 
        $consultasEmpleado->cambiarEstado($coneccion, $idEquipo);
    }
    if(isset($_GET["idEmpleado"]) && isset($_GET["idUsuario"])){
        $coneccion = conexion::conectar();
        echo "<h1> entra</h1>";
        $idEmpleado = $_GET["idEmpleado"];
        $idUsuario = $_GET["idUsuario"];
        echo $idEmpleado;
        //Instaciamos la clase donde estaran los metodos del empleado
        $queryReparaciones = "DELETE FROM usuarios WHERE idUsuario = ?"; 
        $queryReparaciones = $coneccion->prepare($queryReparaciones);
        $queryReparaciones->bindParam(1, $idUsuario, PDO::PARAM_INT);
        if($queryUsiarios->execute()){
            $queryReparaciones = "DELETE FROM empleados WHERE idEmpleado = ?"; 
            $queryReparaciones = $coneccion->prepare($queryReparaciones);
            $queryReparaciones->bindParam(1, $idEmpleado, PDO::PARAM_INT);
            $queryReparaciones = $coneccion->prepare($queryReparaciones);
            $queryReparaciones->execute();
            header("Location: ./registrar-empleado.php");
        }
    }
    
    

?>