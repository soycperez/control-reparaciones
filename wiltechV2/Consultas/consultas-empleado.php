<?php
    class consultasEmpleados{
        //Metodo para obtener las reparaciones actuales, pide como parametros el id del empleado y la conexión a la base de datos
        public function obtenerReparacionesActuales($idEmpleado, $coneccion){
            $queryReparaciones = "SELECT E.idEmpleado, E.nombre, E.apellidos, C.nombre as cNombre, Eq.idEquipo, Eq.marca, Eq.idEquipo, Eq.modelo, Eq.observaciones, Eq.estado
            FROM empleados E
            JOIN clientes C 
                ON (E.idEmpleado = C.idEmpleado)
            JOIN equipos Eq 
                ON (Eq.idCliente = C.idCliente)
                WHERE Eq.estado = 1 && E.idUsuario = ?"; 
            $queryReparaciones = $coneccion->prepare($queryReparaciones);
            //Parametro que pide nuestra cosulta
            $queryReparaciones->bindParam(1, $idEmpleado, PDO::PARAM_INT); 
            //Executamos
            $queryReparaciones->execute();
            //Retornamos columnas seleccionadas en un array
            $result_array = $queryReparaciones->fetchAll(PDO::FETCH_ASSOC);
            //Si el array es distinto de vacio retornamos el mismo
            if(!empty($result_array)){
                return $result_array;
            }else return null;
        }

        //Metodo para cambiar el estado de un equipo, 1 si esta en reparación, 0 si ya esta reparado
        public function cambiarEstado($coneccion, $idEquipo){
            $query = "UPDATE equipos
                        SET estado = 0
                        WHERE idEquipo = ?";
            $queryEquipos = $coneccion->prepare($query);
            $queryEquipos->bindParam(1, $idEquipo, PDO::PARAM_INT);
            if($queryEquipos->execute()){
                //Si se exeicuta la consulta, mandamos a la vista del trabajador
                header("Location: ../vista-trabajador.php");
            }
        }

        //Metodo para ver el historial del emplead con la sesión activa
        public function verHistorial($idEmpleado, $coneccion){
            $query = "SELECT E.idEmpleado, E.nombre, E.apellidos, C.nombre as cNombre, Eq.idEquipo, Eq.idEquipo, Eq.marca, Eq.modelo, Eq.observaciones, Eq.estado
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
