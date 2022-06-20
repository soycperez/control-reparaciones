<?php
	$queryLogin = "SELECT E.idEmpleado, E.nombre, C.nombre, Eq.marca, Eq.modelo, Eq.observaciones, Eq.estado
    FROM empleados E
    JOIN clientes C 
        ON (E.idEmpleado = C.idEmpleado)
    JOIN equipos Eq 
        ON (Eq.idCliente = C.idCliente)
        WHERE Eq.estado = 1
    group by C.nombre";
	echo $queryLogin;
    //iniamos sesión registrada
    session_start(); 
    //Si las variables NO estan definidas el metodo ISSET() retorna FALSE
    $cargo = $_SESSION["cago"];
    echo "<br>". $cargo ;
    include ("../Conexion/conexion.php");
    //Establecemos conexión
    $coneccion = conexion::conectar();
    //Realizamos consulta 
    /*
    $queryLogin = "SELECT E.idEmpleado, E.nombre, U.usuario, U.cargo  
                    FROM empleados E
                    INNER JOIN usuarios U ON E.idUsuario = U.idUsuario
                    WHERE u.usuario = ? AND u.contrasenia = ?";
    //$queryLogin = "SELECT * FROM usuarios WHERE usuario = ? AND contrasenia = ?";
    $queryLogin = $coneccion->prepare($queryLogin);
    $queryLogin->bindParam(1,$usuario, PDO::PARAM_STR, 50); 
    $queryLogin->bindParam(2,$contrasenia, PDO::PARAM_STR, 50); */
    
    /*$queryLogin = "SELECT E.idEmpleado, E.nombre  as eNombre, E.apellidos, C.nombre as cNombre, Eq.marca, Eq.modelo, Eq.observaciones, Eq.estado
    FROM empleados E
    JOIN clientes C 
        ON (E.idEmpleado = C.idEmpleado)
    JOIN equipos Eq 
        ON (Eq.idCliente = C.idCliente)
        WHERE Eq.estado = 1
    group by C.nombre";
    $queryLogin = $coneccion->prepare($queryLogin);
    $queryLogin->execute(); 
    //Retornarmos en un Array asosiativo todos los resultados
    $result_array = $queryLogin->fetchAll(PDO::FETCH_ASSOC);
    //Si empty es false signficia que tiene datos, si regres true, signifca que esta vacion.*/

    /*
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
    $result_array = $queryReparaciones->fetchAll(PDO::FETCH_ASSOC);*/
    $queryLogin = "SELECT E.idEmpleado, E.nombre, E.apellidos
    FROM empleados E
    JOIN usuarios U
    ON E.idUsuario = U.idUsuario
    WHERE U.cargo != 'admin'"; 
            $queryLogin = $coneccion->prepare($queryLogin);
            $queryLogin->execute();
            $result_array = $queryLogin->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($result_array)){
        //Verificamos datos en vector
        echo "<br>";
        echo "<pre>"; 
        var_dump($result_array);
        echo "</pre>"; 
        //Recuperamos los datos que nos importan para la sesión 
        /*
        $cargo =  $result_array[0]["cargo"];
        $usuario = $result_array[0]["usuario"]; 
        $idUsuario = $result_array[0]["idEmpleado"]; 
        $nombre = $result_array[0]["nombre"];*/
    }
?>
