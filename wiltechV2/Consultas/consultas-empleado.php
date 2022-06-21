<?php
    class consultasEmpleados{
        public function obtenerReparacionesActuales($idEmpleado, $coneccion){
            $queryReparaciones = "SELECT E.idEmpleado, E.nombre, E.apellidos, C.nombre as cNombre, Eq.idEquipo, Eq.marca, Eq.modelo, Eq.observaciones, Eq.estado
            FROM empleados E
            JOIN clientes C 
                ON (E.idEmpleado = C.idEmpleado)
            JOIN equipos Eq 
                ON (Eq.idCliente = C.idCliente)
                WHERE Eq.estado = 1 && E.idUsuario = ?"; 
            $queryReparaciones = $coneccion->prepare($queryReparaciones);
            $queryReparaciones->bindParam(1, $idEmpleado, PDO::PARAM_INT); 
            $queryReparaciones->execute();
            $result_array = $queryReparaciones->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result_array)){
                return $result_array;
            }else return null;
        }

        public function cambiarEstado($coneccion, $idEquipo){
            $query = "UPDATE equipos
                        SET estado = 0
                        WHERE idEquipo = ?";
            $queryEquipos = $coneccion->prepare($query);
            $queryEquipos->bindParam(1, $idEquipo, PDO::PARAM_INT);
            if($queryEquipos->execute()){
                header("Location: ../vista-trabajador.php");
            }
        }

        public function verHistorial($idEmpleado, $coneccion){
            $query = "SELECT E.idEmpleado, E.nombre, E.apellidos, C.nombre as cNombre, Eq.idEquipo, Eq.marca, Eq.modelo, Eq.observaciones, Eq.estado
            FROM empleados E
            JOIN clientes C 
                ON (E.idEmpleado = C.idEmpleado)
            JOIN equipos Eq 
                ON (Eq.idCliente = C.idCliente)
                WHERE Eq.estado = 0 && E.idUsuario = ?";
            $queryReparaciones = $coneccion->prepare($query);
            $queryReparaciones->bindParam(1, $idEmpleado, PDO::PARAM_INT); 
            $queryReparaciones->execute();
            $result_array = $queryReparaciones->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result_array)){
                return $result_array;
            }else return null;
            
        }
    }
?>
