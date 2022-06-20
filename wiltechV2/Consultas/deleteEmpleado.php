<?php
    include("../Conexion/conexion.php");
	$coneccion=conexion::conectar(); 
    $idUsuario = $_GET['id'];
    $queryUsiarios = $coneccion->prepare("INSERT INTO usuarios(usuario,contrasenia,cargo) VALUES (?,?,?)");
    $queryUsiarios->bindParam(1, $usuario, PDO::PARAM_STR, 50); 
    $queryUsiarios->bindParam(2, $contrasenia, PDO::PARAM_STR, 50); 
    $queryUsiarios->bindParam(3, $cargo, PDO::PARAM_STR, 10); 
    if($queryUsiarios->execute()){
        $idUsuario = $coneccion->lastInsertId(); 
        $queryEmpleado = $coneccion->prepare("INSERT INTO empleados(nombre,apellidos,idUsuario) VALUES (?,?,?)");
        $queryEmpleado->bindParam(1, $nombre, PDO::PARAM_STR, 50);
        $queryEmpleado->bindParam(2, $apellidos, PDO::PARAM_STR, 50);
        $queryEmpleado->bindParam(3, $idUsuario, PDO::PARAM_INT);
        if($queryEmpleado->execute()){
            header("Location: ../registrar-empleado.php");
                
        }
    }

?>