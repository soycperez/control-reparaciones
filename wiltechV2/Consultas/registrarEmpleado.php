<?php
    include("../Conexion/conexion.php");
	$coneccion=Conexion::conectar(); 

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $cargo = $_POST['cargo'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['nameContrasenia'];

    echo("Nombre: " .$nombre . "-> Apellidos: " . $apellidos. "-> Cargo: ". $cargo ."-> Usuario:". $usuario ."-> Contraseña:". $contrasenia);

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
            echo'<script type="text/javascript">
                    alert("Empleado Guardado");
                    window.location.href="../formulario.html";
                </script>';
        }
    }
    
?>