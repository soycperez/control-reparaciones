<?php
    class reparaciones{
        public function listarReparacionesEmpleado($coneccion){
            //include ("./Conexion/conexion.php");
            //Establecemos conexión
            //$coneccion = conexion::conectar();
            $queryReparaciones = " SELECT E.idEmpleado, E.nombre, E.apellidos, count(Eq.idEmpleado) as equiposEnReparacion
            FROM empleados E
            JOIN clientes C 
                ON (E.idEmpleado = C.idEmpleado)
            JOIN equipos Eq 
                ON (Eq.idCliente = C.idCliente)
                WHERE Eq.estado = 1
            group by Eq.idEmpleado"; 
            $queryReparaciones = $coneccion->prepare($queryReparaciones);
            $queryReparaciones->execute();
            $result_array = $queryReparaciones->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result_array)){
                return $result_array;
            }else return null;
        }

        public function obtenerEmpleados($coneccion){
            //include ("./Conexion/conexion.php");
            //Establecemos conexión
            //$coneccion = conexion::conectar();
            $queryLogin = "SELECT E.idEmpleado, E.nombre, E.apellidos
            FROM empleados E
            JOIN usuarios U
            ON E.idUsuario = U.idUsuario
            WHERE U.cargo != 'admin'"; 
            $queryLogin = $coneccion->prepare($queryLogin);
            $queryLogin->execute();
            $result_array = $queryLogin->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result_array)){
                return $result_array;
            }else return null;
        }

        public function registrarReparacion($coneccion){
                echo "<h1> Entra</h1>";
                //Recuperamos datos en variables. 
                $nombre = $_POST["nombre"]; 
                $marca = $_POST["marca"]; 
                $modelo = $_POST["modelo"]; 
                $estado = 1; 
                $comentarios = $_POST["comentarios"]; 
                $asignar = $_POST["asignar"]; 
                $query = "INSERT INTO clientes(nombre,idEmpleado) VALUES(?,?)"; 
                $queryCliente = $coneccion->prepare($query);
                $queryCliente->bindParam(1, $nombre, PDO::PARAM_STR, 80); 
                $queryCliente->bindParam(2, $asignar, PDO::PARAM_INT); 
                if($queryCliente->execute()){
                    //Recuperamos id del cliente insertado
                    $idCliente = $coneccion->lastInsertId();
                    $query = "INSERT INTO equipos(marca, modelo,observaciones,estado,idCliente,idEmpleado) 
                            VALUES(?,?,?,?,?,?);";
                    $queryEquipo = $coneccion->prepare($query);
                    $queryEquipo->bindParam(1, $marca, PDO::PARAM_STR, 50); 
                    $queryEquipo->bindParam(2, $modelo, PDO::PARAM_STR, 50); 
                    $queryEquipo->bindParam(3, $comentarios, PDO::PARAM_STR, 250); 
                    $queryEquipo->bindParam(4, $estado, PDO::PARAM_STR, 50); 
                    $queryEquipo->bindParam(5, $idCliente, PDO::PARAM_INT); 
                    $queryEquipo->bindParam(6, $asignar, PDO::PARAM_INT); 
                    if($queryEquipo->execute()){
                        header("Location: ../vista-admin.php");
                    }
            //    }
            
            }
        }
    }

?>
