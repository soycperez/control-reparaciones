<?php
	include("../Conexion/conexion.php");
	$coneccion=conexion::conectar(); 
	if($coneccion){
		echo "Conexión establecida";
	}else echo "Error de conexión"
?>