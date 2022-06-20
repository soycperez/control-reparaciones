<?php
    class consultasAdmin{
        public static function reparacionesActivas(){
            include ("./Conexion/conexion.php");
            //Establecemos conexión
            $coneccion = conexion::conectar();
            $queryLogin = "SELECT E.idEmpleado, E.nombre as eNombre, E.apellidos , C.nombre as cNombre, Eq.marca, Eq.modelo, Eq.observaciones, Eq.estado
            FROM empleados E
            JOIN clientes C 
                ON (E.idEmpleado = C.idEmpleado)
            JOIN equipos Eq 
                ON (Eq.idCliente = C.idCliente)
                WHERE Eq.estado = 1
            group by C.nombre";
            $queryLogin = $coneccion->prepare($queryLogin);
            $queryLogin->execute();
            $result_array = $queryLogin->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result_array)){
                return $result_array;
            }else return null;
        }

        public static function empleadosRegistrados(){
            include ("./Conexion/conexion.php");
            //Establecemos conexión
            $coneccion = conexion::conectar();
            $queryLogin = "SELECT E.idEmpleado, E.nombre, E.apellidos, U.usuario, U.cargo, U.idUsuario
            FROM empleados E
            JOIN usuarios U
            ON E.idUsuario = U.idUsuario";
            $queryLogin = $coneccion->prepare($queryLogin);
            $queryLogin->execute();
            $result_array = $queryLogin->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result_array)){
                return $result_array;
            }else return null;
        }

        public static function registrarEmpleado(){
            if(isset($_POST['nombre']) && isset($_POST['apellidos']) &&
             isset($_POST['cargo']) && isset($_POST['usuario']) && isset($_POST['contrasenia'])){
                //Realizamos conexión
                include("./Conexion/conexion.php");
                $coneccion=conexion::conectar(); 
                //Recuperamos datos
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $cargo = $_POST['cargo'];
                $usuario = $_POST['usuario'];
                $contrasenia = $_POST['contrasenia'];
                //Prepramos consulta de usuarios
                $queryUsiarios = $coneccion->prepare("INSERT INTO usuarios(usuario,contrasenia,cargo) VALUES (?,?,?)");
                $queryUsiarios->bindParam(1, $usuario, PDO::PARAM_STR, 50); 
                $queryUsiarios->bindParam(2, $contrasenia, PDO::PARAM_STR, 50); 
                $queryUsiarios->bindParam(3, $cargo, PDO::PARAM_STR, 10); 
                //Ejecutamos consulta
                if($queryUsiarios->execute()){
                    //Obtenemos ID del usuario
                    $idUsuario = $coneccion->lastInsertId(); 
                    //Preparamos conulta de empleado
                    $queryEmpleado = $coneccion->prepare("INSERT INTO empleados(nombre,apellidos,idUsuario) VALUES (?,?,?)");
                    $queryEmpleado->bindParam(1, $nombre, PDO::PARAM_STR, 50);
                    $queryEmpleado->bindParam(2, $apellidos, PDO::PARAM_STR, 50);
                    //Insertamos la ID del usuario para mantener la relación de usuarios -> empleados
                    $queryEmpleado->bindParam(3, $idUsuario, PDO::PARAM_INT);
                    //Ejecutamos conulta
                    if($queryEmpleado->execute()){
                        //Refrescamos pagina
                        //header("Refresh:1");     
                        header("Location: ./registrar-empleado.php");
                    }
                }
            }
        }

        public static function obtenerEmpleado($id){
            if(!empty($id)){
                //Realizamos conexión
                include("./Conexion/conexion.php");
                $coneccion=conexion::conectar(); 
                //Prepramos consulta de usuarios
                $queryEmpleado = "SELECT E.idEmpleado FROM empleados E
                JOIN usuarios U
                ON E.idUsuario = U.idUsuario
                where E.idEmpleado = ?";
                $queryEmpleado = $coneccion->prepare($queryEmpleado);
                //Pasamos parametros
                $queryEmpleado->bindParam(1, $id, PDO::PARAM_INT); 
                //Ejecutamos consulta
                if($queryEmpleado->execute()){
                    $result_array = $queryEmpleado->fetchAll(PDO::FETCH_ASSOC);
                    if(!empty($result_array)){
                        return $result_array;
                    }
                }
            }
        }

        public static function updateEmpleado(){
            if(isset($_POST['idEmpleado']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['usuario']) && isset($_POST['cargo'])){
                //Realizamos conexión
                include("./Conexion/conexion.php");
                $coneccion=conexion::conectar(); 
                //Recuperamos datos
                $idEmpleado = $_POST['idEmpleado'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $usuario = $_POST['usuario'];
                $cargo = $_POST['cargo'];
                echo $idEmpleado;
                //Prepramos consulta de usuarios
                $queryUpdate = "UPDATE empleados as E
                JOIN usuarios as U
                on E.idUsuario = U.idUsuario
                set E.nombre = ?, E.apellidos = ?, U.usuario = ?, U.cargo = ?
                where U.idUsuario = ?"; 
                $queryUpdate = $coneccion->prepare($queryUpdate);
                //Pasamos parametros
                $queryUpdate->bindParam(1, $nombre, PDO::PARAM_STR, 50);
                $queryUpdate->bindParam(2, $apellidos, PDO::PARAM_STR, 50);
                $queryUpdate->bindParam(3, $usuario, PDO::PARAM_STR, 50); 
                $queryUpdate->bindParam(4, $cargo, PDO::PARAM_STR, 50); 
                $queryUpdate->bindParam(5, $idEmpleado, PDO::PARAM_INT); 
                //Ejecutamos consulta
                if($queryUpdate->execute()){
                    //Obtenemos ID del usuario
                    header("Location: ./registrar-empleado.php");
                }
            }

        }

        public static function registrarReparacion(){
            
        }
    }
