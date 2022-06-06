<?php
    include ('Conexion/Conexion.php');
    require_once ('Entidades/Usuarios.php');
    require_once ('Entidades/Empleados.php');
    class DaoEmpleado{
        public function addEmpleado($ObjEmpleado){
            $coneccion=Conexion::conectar(); 

            $nombre = $ObjEmpleado->getNombre();
            $apellidos = $ObjEmpleado->getApellidos(); 
            $user = $ObjEmpleado->getUsuario()->getUsername();  
            $pass = $ObjEmpleado->getUsuario()->getPassword();
            $cargo = $ObjEmpleado->getUsuario()->getCargo();
            
            $consultaUsuario = $coneccion->prepare("INSERT INTO usuarios(username, cargo, password) VALUES (:user,:cargo,:pass)");
            $consultaUsuario->bindParam(':user',$user);
            $consultaUsuario->bindParam(':cargo',$cargo);
            $consultaUsuario->bindParam(':pass',$pass);
            //$consulta->execute(); 
            if($consultaUsuario->execute()){
                $consultaUsuarioId = $coneccion->lastInsertId(); 
                $consultaEmpleado =  $coneccion->prepare("INSERT INTO empleados(nombre,apellidos,idUsuario) VALUES (?,?,?)");
                $consultaEmpleado->bindParam(1,$nombre);
                $consultaEmpleado->bindParam(2,$apellidos);
                $consultaEmpleado->bindParam(3,$consultaUsuarioId);
                if($consultaEmpleado->execute()){
                    $consultaEmpleado = $coneccion->lastInsertId();
                    echo $consultaEmpleado;
                }

            }else{
                $consultaUsuarioId = $coneccion->lastInsertId();  
            }
            
            //$idEmpleado = $cnn->lastInsertId();
            //return $idUsuario;
           /* $sqlEmpleado = "INSERT INTO empleados(nombre,apellidos,idUsuario) VALUES (?,?,?)";
            $insertEmpleado = $this->conect->prepare($sqlEmpleado);
            $arrayEmpleados = array($this->nombre, $this->apellidos,$this->idUsuario);
            $resInsertEmplado = $insertEmpleado->execute($arrayEmpleados);
            $idEmpleado = $this->conect->lastInsertId();
            //return $idEmpleado;*/

        }

        public function addEmpleadoTransation($ObjEmpleado){
        }
    }

?>