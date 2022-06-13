<?php
	$queryLogin = "SELECT E.idEmpleado, E.nombre, U.usuario, U.cargo  
	FROM empleados E
	INNER JOIN usuarios U ON E.idUsuario = U.idUsuario
	WHERE u.usuario = 'cperez' AND u.contrasenia = '123qwe'";
	echo $queryLogin;
    //iniamos sesión registrada
    session_start(); 
    //Si las variables NO estan definidas el metodo ISSET() retorna FALSE
        $cargo = $_SESSION["cago"];
        echo $cargo ;
?>
