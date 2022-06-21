<?php
    class verificarEquipo{
        public static function consultarEquipo(){
            if(isset($_GET["idReparacion"])){
                include ("./Conexion/conexion.php");
                //Establecemos conexión
                $coneccion = conexion::conectar();
                $coneccion = conexion::conectar();
                //echo "<h1> entra</h1>";
                $idReparacion = $_GET["idReparacion"];
                //Instaciamos la clase donde estaran los metodos del empleado
                $queryReparaciones = "SELECT estado FROM equipos WHERE idEquipo = ?"; 
                $queryReparaciones = $coneccion->prepare($queryReparaciones);
                $queryReparaciones->bindParam(1, $idReparacion, PDO::PARAM_INT);
                if($queryReparaciones->execute()){
                    $result_array = $queryReparaciones->fetchAll(PDO::FETCH_ASSOC);
                    return $result_array;
                }
            }

        }
    }
?>